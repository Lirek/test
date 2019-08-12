<?php

namespace App\Http\Controllers\ApiController;

use App\PointsLoser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Spatie\Fractalistic\Fractal;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Yajra\Datatables\Datatables;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use App\PointsAssings;
*/

use App\Events\AssingPointsEvents;
use App\Events\PayementAprovalEvent;
use Response;
use App\User;
use App\TicketsPackage;
use App\Payments;
use App\SistemBalance;
use Carbon\Carbon;
use App\Mail\TransactionApproved;
use Illuminate\Support\Facades\Mail;
use Validator;
use File;

class PaymentController extends Controller {

    public function BuyDepositPackage(Request $request) {
        $datos = $request->only(array_keys($request->all()));
        $rules = [
            'ticket_id' => 'required',
            'costo' => 'required',
            'cantidad' => 'required',
            'referencia' => 'required',
        ];
        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        try {
            $Buy = new Payments;
            $Buy->user_id = auth()->user()->id;
            $Buy->package_id = $request->ticket_id;
            $Buy->cost = $request->costo;
            $Buy->value = $request->cantidad;
            $Buy->method = 'Depósito';
            $Buy->status = 2;
            $Buy->reference = $request->referencia;
            $Buy->save();
            $data = [
                "idPayment" => $Buy->id
            ];
            return response()->json(['meta'=>['code'=>200],'data'=>$data],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }

    public function BuyDepositPackageDocument(Request $request) {
        $datos = $request->only(array_keys($request->all()));
        $rules = [
            'imagen_del_documento' => 'required',
            'idPayment' => 'required'
        ];
        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        try {
            $store_path = public_path().'/user/'.auth()->user()->id.'/ticketsDeposit/';
            $image = $request->imagen_del_documento;
            $image = explode(',',$image);
            if (count($image)==2) {
                $image = $image[1];
            } else {
                $image = $image[0];
            }
            $name = 'deposit'.time().'.png';
            File::put($store_path.'/'.$name, base64_decode($image));
            $real_path ='/user/'.auth()->user()->id.'/ticketsDeposit/'.$name;

            $Buy = Payments::find($request->idPayment);
            $Buy->voucher = $real_path;
            $Buy->save();
            return response()->json(['meta'=>['code'=>201],'data'=>true],201);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }
    
    public function BuyPointsPackage(Request $request) {
        $datos = $request->only(array_keys($request->all()));
        $rules = [
            'ticket_id' => 'required',
            'costo' => 'required',
            'cantidad' => 'required'
        ];
        $validator = Validator::make($datos, $rules);

        if($validator->fails()) {
            return response()->json(['meta'=>['code'=>400],'data'=>$validator->messages(),'original'=>$request->all()],200);
        }
        try {
            if ($request->costo > auth()->user()->points) {
                return response()->json(['meta'=>['code'=>202],'data'=>1],202);
            } else {
                $firstPay = Payments::where('user_id',auth()->user()->id)->where('status','Aprobado')->get();

                $Buy = new Payments;
                $Buy->user_id       = auth()->user()->id;
                $Buy->package_id    = $request->ticket_id;
                $Buy->cost          = $request->costo;
                $Buy->value         = $request->cantidad;
                $Buy->status        = 1;
                $Buy->method        = 'Puntos';
                $Buy->save();

                $TicketsPackage = TicketsPackage::find($request->ticket_id);

                $ticket = $TicketsPackage->amount*$request->cantidad;
                $cost = $request->cantidad*$request->puntos;

                $user = User::find(auth()->user()->id);
                $user->credito = $user->credito + $ticket;
                $user->points = $user->points - $cost;
                $user->save();

                $this->valPuntos($firstPay);

                $Condition = Carbon::now()->firstOfMonth()->toDateString();

                $revenueMonth = Payments::where('user_id',$user->id)
                    ->where('created_at', '>=',$Condition)
                    ->where('status','Aprobado')
                    ->get();

                $balance=  SistemBalance::find(1);
                $TicketsPackage = TicketsPackage::find($request->ticket_id);
                //$balance->tickets_solds = $balance->tickets_solds + $deposit->Tickets->amount;
                $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
                $balance->save();

                if ($revenueMonth->count()<=1) {
                    event(new AssingPointsEvents($user->id,$Buy->package_id));
                }

                event(new PayementAprovalEvent($user->email));
                Mail::to($user->email,$user->name." ".$user->last_name)->send(new TransactionApproved($user));//
            }
            return response()->json(['meta'=>['code'=>200],'data'=>true],200);
        } catch (Exception $e) {
            return response()->json(['meta'=>['code'=>500],'data'=>'Ha ocurrido un error: '.$e],200);
        }
    }

    public function BuyPayphone($id,$cost,$value) {
        // id = id del paquete de los tiquets
        // cost = cost del paquete de los tiquets
        // value = es la cantidad de paquetes de tiquets
        $Buy = new Payments;
        $Buy->user_id       = auth()->user()->id;
        //$Buy->user_id       = 1;
        $Buy->package_id    = $id;
        $Buy->cost          = $cost;
        $Buy->value         = $value;
        $Buy->status        = 2;
        $Buy->method        ='Payphone';
        $Buy->save();
        $Buy = Payments::all();
        $clientTransactionId = $Buy->last()->id."|".date("Y-m-d H:i:s");
        return Response::json(['status'=>'OK','clientTransactionId'=>$clientTransactionId,201]);
    }

    public function factura($idTickets,$medio) {
        // idTickets = lo que devuelve la funcion de BuyPayphone
        // medio = dinero_electronico_ec
        $secuencial = rand(0,100000000);
        $Buy = Payments::find($idTickets);
        $paquete = TicketsPackage::find($Buy->package_id);
        $nombrePaquete = $paquete->name;
        $iva = 0.12;
        $costoPaquete = $Buy->cost;
        $cantidadPaquetes = $Buy->value;
        $valor = ($costoPaquete*$iva)*$cantidadPaquetes;
        $base_imponible =  ($costoPaquete*$cantidadPaquetes)-$valor;
        $total = $costoPaquete*$cantidadPaquetes;
        $data = [
        "ambiente" => 1, // 1: prueba; 2: produccion
        "tipo_emision" => 1, // normal
        "secuencial" => $secuencial, // Id de tickets_sales
        "fecha_emision" => date("c"), //"2018-08-27T22:02:41Z", //Z
        "emisor" => [
            "ruc" => "0992897171001",
            "obligado_contabilidad" => true,
            "contribuyente_especial" => " ",
            "nombre_comercial" => "LEIPEL / MuligHed",
            "razon_social" => "Informeret S.A.",
            "direccion" => "Torres del Mall del Sol, Torre B, Piso 4 (Av. Joaquín Orrantia y Juan Tanca Marengo)",
            "establecimiento" => [
                "punto_emision" => "002",
                "codigo" => "001",
                "direccion" => "Torres del Mall del Sol, Torre B, Piso 4 (Av. Joaquín Orrantia y Juan Tanca Marengo)"
            ]
        ],
        "moneda" =>"USD",
        "totales" => [
            "impuestos" => [[
                "base_imponible" => $base_imponible, // 8.8, // precio base sin el %
                "valor" => $valor, //1.2, // 12% del precio del paquete
                "codigo" => "2", // IVA
                "codigo_porcentaje" => "2" // 12%
            ]],
            "total_sin_impuestos" => $base_imponible, // 8.8,
            "importe_total" => $total, // 10.0, // precio del paquete de tickets
            "propina" => 0.0,
            "descuento" => 0.0
        ],
        "comprador" => [ // datos del usuario
            "email" => auth()->user()->email,
            "identificacion" => auth()->user()->num_doc,
            "tipo_identificacion" => "04", // 04: RUC; 05: Cedula
            "razon_social" => auth()->user()->name." ".auth()->user()->last_name,
            "direccion" => auth()->user()->direccion
            /*
            "email" => "jose.gre@hotmail.es",
            "identificacion" => "24318009",
            "tipo_identificacion" => "05", // 04: RUC; 05: Cedula
            "razon_social" => "Nombre + Apellido",
            "direccion" => "mi casa"
            */
        ],
        "items" => [[
            "cantidad" => $cantidadPaquetes, // 1.0, // cantidad de paquetes comprados
            "precio_unitario" => $costoPaquete, // 10.0, // precio del paquete de tickets
            "descripcion" => "Compra de Paquete de Tickets Leipel. ".$nombrePaquete, // "Compra de Paquete de Tickets Leipel", // nombre del paquete
            "precio_total_sin_impuestos" => $total, // 10.0, // cantidad*precio_unitario //cambiado
            "impuestos" => [[
                "base_imponible" => $base_imponible, // 8.8, // precio base sin el %
                "valor" => $valor, // 1.2, // 12% del precio del paquete
                "tarifa" => 12.0, // 12%
                "codigo" => "2", // IVA
                "codigo_porcentaje" => "2" // 12%
                ]],
            "descuento" => 0.0
            ]],
        "pagos" => [[
            "medio" => $medio, // "deposito_cuenta_bancaria", // deposito_cuenta_bancaria/dinero_electronico_ec
            "total" => $total // 10.0 // precio del paquete de tickets
            ]]
        ];
        $urlEmision = "https://link.datil.co/invoices/issue";
        $headers    = array("Content-Type: application/json", "X-Key: e884359eb97147fa8a1fd77ffe6e308b", "X-Password: DTleipel8892");
        $datapost   = json_encode($data);
        $ch         = curl_init();
        curl_setopt($ch,CURLOPT_URL,$urlEmision);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close ($ch);
        $respuesta = json_decode($response);
        return Response::json(['status'=>'OK','factura'=>$respuesta,201]);
    }

    public function TransactionApproved($id,$reference,$tickets,$idFactura) {
        // id = id del pago del paquete de tiquets
        // reference = transactionId (campo de respuesta de PayPhone)
        // tickets = cantidad de paquetes a comprar * campo 'amount' del paquete de tiquets
        // idFactura = id (campo de respuesta de la funcion 'factura')
        $Buy = Payments::find($id);
        $Buy->status    = 1;
        $Buy->reference = $reference;
        $Buy->factura_id = $idFactura;
        $Buy->save();
        $this->creditos($tickets);
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
        if ($user->pending_points != 0 && $user->points < $user->limit_points) {
            $user->points = $user->points + $user->pending_points;
            $user->pending_points = 0;
            $user->save();
        }
        $Condition = Carbon::now()->firstOfMonth()->toDateString();
        $revenueMonth = Payments::where('user_id',auth()->user()->id)
        //$revenueMonth = Payments::where('user_id',1)
            ->where('created_at','>=',$Condition)
            ->where('status','Aprobado')
            ->get();
        $balance = SistemBalance::find(1);
        $TicketsPackage = TicketsPackage::find($Buy->package_id);
        $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
        $balance->save();
        if ($revenueMonth->count()<=1) {
            event(new AssingPointsEvents(auth()->user()->id,$Buy->package_id));
            //event(new AssingPointsEvents(1,$Buy->package_id));
        }
        $this->correo();
        $respuesta = true;
        return Response::json(['status'=>'OK','aprobado'=>$respuesta,201]);
    }

    public function creditos($ticket) {
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
        $user->credito = $user->credito + $ticket;
        $user->save();
    }

    public function correo() {
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
        Mail::to($user->email,$user->name." ".$user->last_name)->send(new TransactionApproved($user));
    }

    public function TransactionCanceled($id,$reference) {
        // id = id del pago del paquete de tiquets
        // reference = transactionId (campo de respuesta de PayPhone)
        $Buy = Payments::find($id);
        $Buy->status    = 3;
        $Buy->reference = $reference;
        $Buy->save();
        $respuesta = true;
        return Response::json(['status'=>'OK','cancel'=>$respuesta,201]);
    }

    public function valPuntos($firstPay) {
        $user = User::find(auth()->user()->id);
        if ($firstPay->count()==0) { // nunca a hecho pagos (apartando el que acaba de hacer)
            if ($user->pending_points != 0 && $user->points <= $user->limit_points) {
                if ($user->points + $user->pending_points > $user->limit_points) {
                    $todosPuntos = $user->points + $user->pending_points;
                    $restoPuntos = $todosPuntos - $user->limit_points;
                    $user->points = $user->points + ( $user->pending_points - $restoPuntos );
                    $pointsLoser = new PointsLoser;
                    $pointsLoser->user_id = auth()->user()->id;
                    $pointsLoser->points = $restoPuntos;
                    $pointsLoser->reason = "Excedió el límite de puntos permitidos";
                    $pointsLoser->save();
                } else {
                    $user->points = $user->points + $user->pending_points;
                }
                $user->pending_points = 0;
            }
        } else { // ya ha hecho pagos
            $firstDay = Carbon::now()->firstOfMonth()->subMonth(1)->toDateString();
            $lastDay = Carbon::now()->lastOfMonth()->subMonth(1)->toDateString();
            // pago el mes pasado?
            $paymentsMonthPass = Payments::where('user_id',auth()->user()->id)
                ->whereBetween('created_at',[$firstDay,$lastDay])
                ->where('status','Aprobado')
                ->get();
            if ($paymentsMonthPass->count()==0) { // no pagó
                $pointsLoser = new PointsLoser;
                $pointsLoser->user_id = auth()->user()->id;
                $pointsLoser->points = $user->pending_points;
                $pointsLoser->reason = "No recargó el mes pasado";
                $pointsLoser->save();
                $user->pending_points = 0;
            } else { // si pagó el mes pasado
                if ($user->pending_points != 0 && $user->points <= $user->limit_points) {
                    if ($user->points + $user->pending_points > $user->limit_points) {
                        $todosPuntos = $user->points + $user->pending_points;
                        $restoPuntos = $todosPuntos - $user->limit_points;
                        $user->points = $user->points + ( $user->pending_points - $restoPuntos );
                        $pointsLoser = new PointsLoser;
                        $pointsLoser->user_id = auth()->user()->id;
                        $pointsLoser->points = $restoPuntos;
                        $pointsLoser->reason = "Excedió el límite de puntos permitidos";
                        $pointsLoser->save();
                    } else {
                        $user->points = $user->points + $user->pending_points;
                    }
                    $user->pending_points = 0;
                }
            }
        }
        $user->save();
    }
}

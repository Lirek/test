<?php

namespace App\Http\Controllers\ApiController;

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
*/

use App\Events\AssingPointsEvents;

//use JWTAuth;
use Response;

use App\User;
use App\TicketsPackage;
use App\Payments;
//use App\PointsAssings;
use App\SistemBalance;

use Carbon\Carbon; //
use App\Mail\TransactionApproved; //
use Illuminate\Support\Facades\Mail; //

class PaymentController extends Controller
{
    
    public function BuyPointsPackage(Request $request) {
        $user = User::find(auth()->user()->id);
        //$user = User::find(1);
        $TicketsPackage= TicketsPackage::find($request->ticket_id);

        if ($request->cost > $user->points) {
            return Response::json(['status'=>'Puntos insuficientes',201]);;
        } else {
            $Buy = new Payments;
            $Buy->user_id       = auth()->user()->id;
            //$Buy->user_id       = 1;
            $Buy->package_id    =$request->ticket_id;
            $Buy->cost          =$request->points;
            $Buy->value         =$request->Cantidad;
            $Buy->status        = 1;
            $Buy->method        ='Puntos';
            $Buy->save();

            $ticket=$TicketsPackage->amount*$request->Cantidad;
            $cost=$request->Cantidad*$request->points;

            $user->credito = $ticket;
            $user->points = $user->points - $cost;
            $user->save();

            $Condition=Carbon::now()->firstOfMonth()->toDateString();

            $revenueMonth = Payments::where('user_id','=',$user->id)
                ->where('created_at', '>=',$Condition)
                ->where('status', '=','Aprobado')
                ->get();

            $balance=  SistemBalance::find(1);
            $TicketsPackage = TicketsPackage::find($request->ticket_id); //
            //$balance->tickets_solds = $balance->tickets_solds + $deposit->Tickets->amount;
            $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount; //

            $balance->save();

            if ($revenueMonth->count()<=1) {
                event(new AssingPointsEvents($user->id,$Buy->package_id));
            }

            //event(new PayementAprovalEvent($user->email));
            Mail::to($user->email,$user->name." ".$user->last_name)->send(new TransactionApproved($user));//
        }
        return Response::json(['status'=>'OK',201]);
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
}

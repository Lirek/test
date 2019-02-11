<?php

namespace App\Http\Controllers;
use Auth;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\User;
use App\Megazines;
use App\Tags;
use App\Albums;
use App\Songs;
use App\Seller;
use App\Radio;
use App\BookAuthor;
use App\Book;
use App\Tv;
use App\music_authors;
use App\Transactions;
use App\Referals;
use App\Movie;
use App\TicketsPackage;
use App\Payments;
use App\SistemBalance;

use App\AccountBalance;
use App\Serie;
use App\Episode;

use App\PointsAssings;
use App\PointsLoser;

use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionApproved;
use App\Mail\ApprovalNotification;

use App\Events\AssingPointsEvents;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user= User::find(Auth::user()->id);
        /*
        $TransacctionsSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->count(); 
        $TransacctionsAlbum= Transactions::where('user_id','=',Auth::user()->id)->where('album_id','<>',0)->count();
        $TransacctionsBook= Transactions::where('user_id','=',Auth::user()->id)->where('books_id','<>',0)->count();
        $TransacctionsMegazine= Transactions::where('user_id','=',Auth::user()->id)->where('megazines_id','<>',0)->count(); 
        $TransacctionsMovies= Transactions::where('user_id','=',Auth::user()->id)->where('movies_id','<>',0)->count();
        $TransacctionsSeries= Transactions::where('user_id','=',Auth::user()->id)->where('Series_id','<>',0)->count();   
        $TransactionsRadio=Radio::where('status','=','Aprobado')->count();
        $TransactionsTv=Tv::where('status','=','Aprobado')->count();

        $TransacctionsMusic=$TransacctionsSingle+$TransacctionsAlbum;
        $TransactionsLecture=$TransacctionsMegazine+$TransacctionsBook;
        */

        $musica = [];
        $Songs = Songs::whereNull('album')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Songs as $s) {
            $musica[] = array(
                'id' => $s->id,
                'type' => 'Single',
                'cover' => '/plugins/img/DefaultMusic.png',
                'cost' => $s->cost,
                'title' => $s->song_name
            );
        }
        $Albums = Albums::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Albums as $a) {
            $musica[] = array(
                'id' => $a->id,
                'type' => 'Album',
                'cover' => $a->cover,
                'cost' => $a->cost,
                'title' => $a->name_alb
            );
        }

        $cine = [];
        $Movies = Movie::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Movies as $m) {
            $cine[] = array(
                'id' => $m->id,
                'type' => 'Pelicula',
                'img_poster' => 'movie/poster/'.$m->img_poster,
                'title' => $m->title,
                'cost' => $m->cost
            );
        }
        $Series = Serie::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Series as $s) {
            $cine[] = array(
                'id' => $s->id,
                'type' => 'Serie',
                'img_poster' => $s->img_poster,
                'title' => $s->title,
                'cost' => $s->cost
            );
        }

        $lectura = [];
        $Megazines = Megazines::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Megazines as $m) {
            $lectura[] = array(
                'id' => $m->id,
                'type' => 'Revista',
                'title' => $m->title,
                'cost' => $m->cost,
                'cover' => $m->cover
            );
        }
        $Book = Book::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Book as $b) {
            $lectura[] = array(
                'id' => $b->id,
                'type' => 'Libro',
                'title' => $b->title,
                'cost' => $b->cost,
                'cover' => "/images/bookcover/".$b->cover
            );
        }
        
        $radios = [];
        $Radio = Radio::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Radio as $r) {
            $radios[] = array(
                'id' => $r->id,
                'logo' => $r->logo,
                'name' => $r->name_r
            );
        }
        
        $tvs = [];
        $Tv = Tv::where('status','Aprobado')->orderBy('updated_at','desc')->orderBy('created_at','desc')->paginate(8);
        foreach ($Tv as $t) {
            $tvs[] = array(
                'id' => $t->id,
                'logo' => $t->logo,
                'name' => $t->name_r
            );
        }

        if($user['status']=='admin')
        {
            return redirect('/admin');
        }

        return view('home')
            /*
            ->with('TransactionsMusic',$TransacctionsMusic)
            ->with('TransacctionsLecture',$TransactionsLecture)
            ->with('TransactionsMovies',$TransacctionsMovies)
            ->with('TransactionsRadio',$TransactionsRadio)
            ->with('TransactionsTv',$TransactionsTv)
            */
            ->with('cine',$cine)
            ->with('musica',$musica)
            ->with('lectura',$lectura)
            ->with('radio',$radios)
            ->with('tv',$tvs);

    }

    public function DataContentGraph()
    {
        $Songs=Songs::where('album','=',0)->get();
        
        $Albums= Albums::where('status','=','Aprobado')->get();
        
        $Music=$Songs->count()+$Albums->count();
        
        $Movies=Movie::where('status','=','Aprobado')->get()->count();
        
        $Megazines=Megazines::where('status','=','Aprobado')->get()->count();
        
        $Book=Book::where('status','=','Aprobado')->get()->count();
        
        $Radio=Radio::where('status','=','Aprobado')->get()->count();
        
        $Tv=Tv::where('status','=','Aprobado')->get()->count();
        
        $Movies=Movie::where('status','=','Aprobado')->get()->count();

        $Series=0;

        $Content=array(
                          $Music,
                          $Book,
                          $Megazines,
                          $Movies,
                          $Radio,
                          $Tv,
                          $Series, 
                         );

        return Response()->json($Content);
    }

    public function MyTickets($id)
    {
        $MyTickets=Auth::user()->credito;
        $Points=Auth::user()->points;
        $Pending=Auth::user()->pending_points;
        //dd($MyTickets);
        if ($MyTickets==null){
            $MyTickets = 0;
        }
        if ($Points==null){
            $Points = 0;
        }
        if ($Pending==null){
            $Pending = 0;
        }
        $respuesta=$MyTickets." T/ ".$Points." P/ ".$Pending." PP";
        return Response()->json($respuesta);
    }

    public function validarPatrocinador($codigo) {
        $ids = NULL;
        $cods = NULL;
        $user = User::find(Auth::user()->id);
        //$user = User::find(5);
        $datos1 = $user->referals()->get();
        if ($datos1->count()>0) {
            foreach ($datos1 as $info) {
                $ids[] = $info->refered;
            }
        }
        if ($ids!=NULL) {
            for ($i=0; $i < count($ids); $i++) { 
                $user = User::find($ids[$i]);
                $datos = $user->referals()->get();
                if ($datos->count()>0) {
                    foreach ($datos as $info) {
                        $ids[] = $info->refered;
                    }
                }
            }
            $info = User::select('codigo_ref')->whereIn("id",$ids)->get();
            foreach ($info as $key) {
                $cods[] = $key->codigo_ref;
            }
        }
        //dd($cods);
        if ($cods===NULL) { // si es NULL se agrega sin problema porque esa persona no tiene red
            $agregar = 3;
        } else { // si tiene red hay que revisar que el codigo no pertenezca a alguien de dicha red
            $busqueda = in_array($codigo, $cods);
            if ($busqueda===true) { // el codigo ya lo tiene alguien de su red
                $agregar = 2;
            } else { // puede agregar ese codigo sin problema
                $agregar = 3;
            }
        }
        return $agregar;
    }
    
    public function sponsor($codigo){
        $validarPatrocinador = $this->validarPatrocinador($codigo);
        $miCod = Auth::user()->codigo_ref;
        if ($miCod==$codigo) {
            return Response()->json(1);
        } else {
            if ($validarPatrocinador==2) {
                return Response()->json($validarPatrocinador);
            } else {
                $sponsor=User::where('codigo_ref','=',$codigo)->first();
                if ($sponsor) {
                    return Response()->json($sponsor);
                }else{
                    return Response()->json(0);
                }
            }
        }
    }

    public function Beneficios(){
        return view('users.Beneficios');

    }

    public function SaleTickets(){
        $Balance = NULL;
        $BalancePuntos = NULL;
        $package=TicketsPackage::all();

        $Transaction=Transactions::where('user_id',Auth::user()->id)->get();
        if ($Transaction->count()!= 0) {
            foreach ($Transaction as $key)  {
                if($key->books_id != 0){
                    $accionM=Book::find($key->books_id);
                    $accion=$accionM->title;
                    //$accion='Compra de libro';
                            
                }
                elseif($key->album_id != 0){
                    $accionM=Albums::find($key->album_id);
                    $accion=$accionM->name_alb;
                }
                elseif($key->song_id != 0){
                    $accionM=Songs::find($key->song_id);
                    $accion=$accionM->song_name;
                }
                elseif($key->series_id != 0){
                    $accionM=Serie::find($key->series_id);
                    $accion=$accionM->title;
                }
                elseif($key->episodes_id != 0){
                    $accionM=Episode::find($key->episodes_id);
                    $accion=$accionM->episode_name;
                }
                elseif($key->movies_id != 0){
                    $accionM=Movie::find($key->movies_id);
                    $accion=$accionM->original_title;
                }
                elseif($key->megazines_id != 0){
                    $accionM=Megazines::find($key->megazines_id);
                    $accion=$accionM->title;
                }
                $Balance[]=array(
                        'Id' => $key->user_id,
                        'Date'=>$key->created_at->format('d/m/Y'),
                        'Cant'=>$key->tickets,
                        'Transaction'=>$accion,
                        'Type' => 1,
                        //'Factura' => $key->factura_id
                    );
            }
        }/*else{

            $Balance[]=0;
        }*/
        $Payment=Payments::where('user_id',Auth::user()->id)->where('status','Aprobado')->where('method','<>','Puntos')->get();
        if ($Payment->count() != 0) {
            foreach ($Payment as $key) {
                $Balance[]=array(
                    'id_payments' => $key->id,
                    'Id' => $key->user_id,
                    'Date' => $key->created_at->format('d/m/Y'),
                    'Cant' => $this->tickets($key->package_id)*$key->value,
                    'Transaction' => 'Compra de tickets: '.$this->packTicket($key->package_id),
                    'Type' => 2,
                    'Method'=>$key->method,
                    'Factura' => $key->factura_id
                );
            }
        }/*else{
            $Balance[]=0;
        }*/
        $Payment=Payments::where('user_id',Auth::user()->id)->where('status','Aprobado')->where('method','Puntos')->get();
        //dd($Payment->count() != 0);
        if ($Payment->count() != 0) {
            foreach ($Payment as $key) {
                $BalancePuntos[]=array(
                    'id_payments' => $key->id,
                    'Id' => $key->user_id,
                    'Date' => $key->created_at->format('d/m/Y'),
                    'Cant' => $this->tickets($key->package_id)*$key->value,
                    'Transaction' => 'Compra de tickets: '.$this->packTicket($key->package_id),
                    'Type' => 2,
                    'Method'=>$key->method,
                    'Factura' => $key->factura_id
                );
            }
        }/*else{
            $Balance[]=0;
        }*/
        $pointsLoser = PointsLoser::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        $ordenBalance=collect($Balance)->sortBy('Date')->reverse()->toArray();
        $ordenBalancePuntos=collect($BalancePuntos)->sortBy('Date')->reverse()->toArray();
        
        return view('users.SalesTickets')->with('package',$package)->with('Balance',$ordenBalance)->with('BalancePuntos',$ordenBalancePuntos)->with('pointsLoser',$pointsLoser);
    }

    public function BuyPlan(Request $request){
        //dd($request->all());
        $Buy = new Payments;
        $Buy->user_id=Auth::user()->id;
        $Buy->package_id=$request->ticket_id;
        $Buy->cost=$request->cost;
        $Buy->value=$request->Cantidad;
        $Buy->method='Depósito';

         if ($request->hasFile('voucher'))
        {


         $store_path = public_path().'/user/'.Auth::user()->id.'/ticketsDeposit/';
         
         $name = 'deposit'.$request->name.time().'.'.$request->file('voucher')->getClientOriginalExtension();

         $request->file('voucher')->move($store_path,$name);

         $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name;
         
         $Buy->voucher = $real_path='/user/'.Auth::user()->id.'/ticketsDeposit/'.$name; 

        }
        $Buy->status=2;
        $Buy->reference=$request->references;
        $Buy->save();
        /*
        $emailAdmin = "bcastillo@leipel.com";
        $motivo = "Pago por depósito pendiente por aprobar";
        Mail::to($emailAdmin)->send(new ApprovalNotification($motivo));
        */
        Flash('Pago registrado, en proceso de validación')->success();
        return redirect()->action('HomeController@index');

    }
    
    public function BuyPoints(Request $request) {
        
        //$user = User::find(Auth::user()->id);

        if ($request->cost > Auth::user()->points) {
            return response()->json(1);
        } else {
            $firstPay = Payments::where('user_id',Auth::user()->id)->where('status','Aprobado')->get();
            $Buy = new Payments;
            $Buy->user_id       = Auth::user()->id;
            $Buy->package_id    =$request->ticket_id;
            $Buy->cost          =$request->points;
            $Buy->value         =$request->Cantidad;
            $Buy->status        = 1;
            $Buy->method        ='Puntos';
            $Buy->save();
            $cant=$this->tickets($request->ticket_id);
            $ticket=$cant*$request->Cantidad;
            $cost=$request->Cantidad*$request->points;
            $this->creditos($ticket);
            $this->points($cost);
            $this->valPuntos($firstPay);
            $Condition = Carbon::now()->firstOfMonth()->toDateString();
            $revenueMonth = Payments::where('user_id',Auth::user()->id)
                ->where('created_at','>=',$Condition)
                ->where('status','Aprobado')
                ->get();
            $balance = SistemBalance::find(1);
            $TicketsPackage = TicketsPackage::find($request->ticket_id);
            $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
            $balance->save();
            if ($revenueMonth->count()<=1) { // si es el 1er pago del mes
                event(new AssingPointsEvents(Auth::user()->id,$request->ticket_id));
            }
            $this->correo();
            return response()->json($Buy);
        }
    }

    public function BuyPayphone($id,$cost,$value) {
        $Buy = new Payments;
        $Buy->user_id       = Auth::user()->id;
        $Buy->package_id    = $id;
        $Buy->cost          = $cost;
        $Buy->value         = $value;
        $Buy->status        = 2;
        $Buy->method        ='Payphone';
        $Buy->save();
        $Buy = Payments::orderBy('id','desc')->get();
        $clientTransactionId = $Buy->last()->id."|".date("Y-m-d H:i:s");
        return Response()->json($clientTransactionId);
    }

    public function TransactionCanceled($id,$reference) {
        $Buy = Payments::find($id);
        $Buy->status    = 3;
        $Buy->reference = $reference;
        $Buy->save();
        $respuesta = true;
        return Response()->json($respuesta);
    }

    public function TransactionApproved($id,$reference,$tickets,$idFactura) {
        $firstPay = Payments::where('user_id',Auth::user()->id)->where('status','Aprobado')->get();
        $Buy = Payments::find($id);
        $Buy->status    = 1;
        $Buy->reference = $reference;
        $Buy->factura_id = $idFactura;
        $Buy->save();
        $this->creditos($tickets);
        $this->valPuntos($firstPay);
        $Condition = Carbon::now()->firstOfMonth()->toDateString();
        $revenueMonth = Payments::where('user_id',Auth::user()->id)
            ->where('created_at','>=',$Condition)
            ->where('status','Aprobado')
            ->get();
        $balance = SistemBalance::find(1);
        $TicketsPackage = TicketsPackage::find($Buy->package_id);
        $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
        $balance->save();
        if ($revenueMonth->count()<=1) {
            event(new AssingPointsEvents(Auth::user()->id,$Buy->package_id));
        }
        $this->correo();
        $respuesta = "todo bien";
        return Response()->json($respuesta);
    }

    public function creditos($ticket) {
        $user = User::find(Auth::user()->id);
        $user->credito = $user->credito + $ticket;
        $user->save();
    }

    public function points($points) {
        $user = User::find(Auth::user()->id);
        $user->points = $user->points - $points;
        $user->save();
    }

    public function valPuntos($firstPay) {
        $user = User::find(Auth::user()->id);
        if ($firstPay->count()==0) { // nunca a hecho pagos (apartando el que acaba de hacer)
            if ($user->pending_points != 0 && $user->points <= $user->limit_points) {
                if ($user->points + $user->pending_points > $user->limit_points) {
                    $todosPuntos = $user->points + $user->pending_points;
                    $restoPuntos = $todosPuntos - $user->limit_points;
                    $user->points = $user->points + ( $user->pending_points - $restoPuntos );
                    $pointsLoser = new PointsLoser;
                    $pointsLoser->user_id = Auth::user()->id;
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
            $paymentsMonthPass = Payments::where('user_id',Auth::user()->id)
                ->whereBetween('created_at',[$firstDay,$lastDay])
                ->where('status','Aprobado')
                ->get();
            if ($paymentsMonthPass->count()==0) { // no pagó
                $pointsLoser = new PointsLoser;
                $pointsLoser->user_id = Auth::user()->id;
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
                        $pointsLoser->user_id = Auth::user()->id;
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
    /*
    public function TransactionPending($id,$reference) {
        $Buy = Payments::find($id);
        $Buy->reference = $reference;
        $Buy->save();
        $respuesta = true;
        return Response()->json($respuesta);
    }
    */

    public function correo() {
        $user = User::find(Auth::user()->id);
        Mail::to($user->email,$user->name." ".$user->last_name)->send(new TransactionApproved($user));
    }

    public function generarFactura($idFactura,$id_payments) {
        $Buy = Payments::find($id_payments);
        $Buy->factura_id = $idFactura;
        $Buy->save();
        $respuesta = "lista factura";
        return Response()->json($respuesta);
    }

    public function factura($idTickets,$medio) {

        $secuencial = rand(0,100000000);
        $Buy = Payments::find($idTickets);
        $paquete = TicketsPackage::find($Buy->package_id);
        $ambiente = env('AMB_DATIL');
        $nombrePaquete = $paquete->name;
        $iva = 0.12;
        $costoPaquete = $Buy->cost;
        $cantidadPaquetes = $Buy->value;
        $valor = ($costoPaquete*$iva)*$cantidadPaquetes;
        $base_imponible =  ($costoPaquete*$cantidadPaquetes)-$valor;
        $total = $costoPaquete*$cantidadPaquetes;
        $data = [
        "ambiente" => $ambiente, // 1: prueba; 2: produccion
        "tipo_emision" => 1, // normal
        "secuencial" => $secuencial, 
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
            "email" => Auth::user()->email,
            "identificacion" => Auth::user()->num_doc,
            "tipo_identificacion" => "04", // 04: RUC; 05: Cedula
            "razon_social" => Auth::user()->name." ".Auth::user()->last_name,
            "direccion" => Auth::user()->direccion
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
        return Response()->json($respuesta);
    }

    public function tickets($id){
        $cantidad=TicketsPackage::find($id);
        return $cantidad->amount;
    }

    public function packTicket($id){
        $cantidad=TicketsPackage::find($id);
        return $cantidad->name;
    }

}

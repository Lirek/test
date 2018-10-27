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

use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionApproved;

use App\Events\AssingPointsEvents;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::find(Auth::user()->id);
        
        $TransacctionsSingle= Transactions::where('user_id','=',Auth::user()->id)->where('song_id','<>',0)->count(); 
        $TransacctionsAlbum= Transactions::where('user_id','=',Auth::user()->id)->where('album_id','<>',0)->count();
        $TransacctionsBook= Transactions::where('user_id','=',Auth::user()->id)->where('books_id','<>',0)->count();
        $TransacctionsMegazine= Transactions::where('user_id','=',Auth::user()->id)->where('megazines_id','<>',0)->count(); 
        $TransacctionsMovies= Transactions::where('user_id','=',Auth::user()->id)->where('movies_id','<>',0)->count();   
        $TransactionsRadio=Radio::where('status','=','Aprobado')->count();
        $TransactionsTv=Tv::where('status','=','Aprobado')->count();

        $Songs=Songs::where('album','=',0)->take(10)->orderBy('created_at','desc')
->get();
        
        $Albums= Albums::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        
        $Movies=Movie::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        
        $Megazines=Megazines::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        
        $Book=Book::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        
        $Radio=Radio::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        $Tv=Tv::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();
        
        $Movies=Movie::where('status','=','Aprobado')->orderBy('updated_at','desc')->take(10)->orderBy('created_at','desc')
->get();

        $Series=0;
        
        if ($Movies==NULL) { $Movies=False; }
        if ($Tv==NULL) { $Tv=False; }
        if ($Radio==NULL) { $Radio=False; }
        if ($Megazines==NULL) { $Megazines=False; }
        if ($Albums==NULL) { $Albums=False; }
        if ($Songs==NULL) { $Songs=False; }           

        if($user['status']=='admin')
        {
            return redirect('/admin');
        }

        $TransacctionsMusic=$TransacctionsSingle+$TransacctionsAlbum;
        $TransactionsLecture=$TransacctionsMegazine+$TransacctionsBook;
        return view('home')
                             ->with('TransactionsMusic',$TransacctionsMusic)
                             ->with('TransacctionsLecture',$TransactionsLecture)
                             ->with('TransactionsMovies',$TransacctionsMovies)
                             ->with('TransactionsRadio',$TransactionsRadio)
                             ->with('TransactionsTv',$TransactionsTv)
                             ->with('Songs',$Songs)
                             ->with('Albums',$Albums)
                             ->with('Movies',$Movies)
                             ->with('Megazines',$Megazines)
                             ->with('Book',$Book)
                             ->with('Radio',$Radio)
                             ->with('Tv',$Tv);

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
        $cod1 = NULL;
        $cod2 = NULL;
        $cod3 = NULL;
        $id_ref1 = NULL;
        $id_ref2 = NULL;
        $id_ref3 = NULL;
        $L2 = NULL;
        $L3 = NULL;
        $L1 = Referals::where('user_id',Auth::user()->id)->get();
        if ($L1!=NULL) {
            foreach ($L1 as $key1) {
                $id_ref1[] = $key1->refered;
                $L2 = Referals::where('user_id',$id_ref1)->get();
            }
            if ($id_ref1!=NULL) {
                for ($i=0; $i < count($id_ref1); $i++) { 
                    $user1[] = User::find($id_ref1[$i]);
                }
                if ($user1!=NULL) {
                    foreach ($user1 as $codUser1) {
                        $cod1[] = $codUser1->codigo_ref;
                    }
                }
            }
        }
        if ($L2!=NULL) {
            foreach ($L2 as $key2) {
                $id_ref2[] = $key2->refered;
                $L3 = Referals::where('user_id',$id_ref2)->get();
            }
            if ($id_ref2!=NULL) {
                for ($i=0; $i < count($id_ref2); $i++) { 
                    $user2[] = User::find($id_ref2[$i]);
                }
                if ($user2!=NULL) {
                    foreach ($user2 as $codUser2) {
                        $cod2[] = $codUser2->codigo_ref;
                    }
                }
            }
        }
        if ($L3!=NULL) {
            foreach ($L3 as $key3) {
                $id_ref3[] = $key3->refered;
            }
            if ($id_ref3!=NULL) {
                for ($i=0; $i < count($id_ref3); $i++) { 
                    $user3[] = User::find($id_ref3[$i]);
                }
                if ($user3!=NULL) {
                    foreach ($user3 as $codUser3) {
                        $cod3[] = $codUser3->codigo_ref;
                    }
                }
            }
        }
        $cods = NULL;
        if ($cod1!=NULL) {
            $cods = array_merge($cod1);
        }
        if ($cod2!=NULL) {
            $cods = array_merge($cods,$cod2);
        }
        if ($cod3!=NULL) {
            $cods = array_merge($cods,$cod3);
        }
        if ($cods!=NULL) {
            $existe = in_array($codigo, $cods);
        } else {
            $existe = 3; // el codigo no existe en su lista de referidos
        }
        if ($existe) {
            $existe = 2; // el codigo existe en su lista de referidos
        }
        return $existe;
    }
    
    public function sponsor($codigo){
        $validarPatrocinador = $this->validarPatrocinador($codigo);
        $miCod = Auth::user()->codigo_ref;
        if ($miCod==$codigo) {
            return Response()->json(1);
        } else {
            if ($validarPatrocinador) {
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

    public function SaleTickets(){

        $package=TicketsPackage::all();

        $Transaction=Transactions::where('user_id','=',Auth::user()->id)->get();
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
                    $accion=$accionM->title;
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
        }else{

            $Balance[]=0;
        }
        $Payment=Payments::where('user_id','=',Auth::user()->id)->where('status','=','Aprobado')->get();
        if ($Payment->count() != 0) {
            foreach ($Payment as $key) {
                $Balance[]=array(
                    'Id' => $key->user_id,
                    'Date' => $key->created_at->format('d/m/Y'),
                    'Cant' => $this->tickets($key->package_id)*$key->value,
                    'Transaction' => 'Compra de tickets: '.$this->packTicket($key->package_id),
                    'Type' => 2,
                    'Method'=>$key->method,
                    'Factura' => $key->factura_id
                );
            }
        }else{
            $Balance[]=0;
        }
        
        $ordenBalance=collect($Balance)->sortBy('Date')->reverse()->toArray();

        return view('users.SalesTickets')->with('package',$package)->with('Balance',$ordenBalance);
    }

    public function BuyPlan(Request $request){
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
        Flash('Pago registrado, en proceso de validación')->success();
        return redirect()->action('HomeController@index');

    }
    
    public function BuyPoints(Request $request) {
        
        $user = User::find(Auth::user()->id);

        if ($request->cost > $user->points) {
             return response()->json(1);  
        } else {
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

            $Condition = Carbon::now()->firstOfMonth()->toDateString();
            $revenueMonth = Payments::where('user_id',Auth::user()->id)
                ->where('created_at','>=',$Condition)
                ->where('status','Aprobado')
                ->get();
            $balance = SistemBalance::find(1);
            $TicketsPackage = TicketsPackage::find($request->ticket_id);
            $balance->tickets_solds = $balance->tickets_solds + $TicketsPackage->amount;
            $balance->save();
            if ($revenueMonth->count()<=1) {
                event(new AssingPointsEvents(Auth::user()->id,$TicketsPackage->package_id));
            }

            $this->creditos($ticket);
            $this->points($cost);
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
        $Buy = Payments::all();
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

    public function TransactionApproved($id,$reference,$ticket,$idFactura) {
        
        $Buy = Payments::find($id);
        $Buy->status    = 1;
        $Buy->reference = $reference;
        $Buy->factura_id = $idFactura;
        $Buy->save();
        $this->creditos($ticket);
        $this->correo();
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
            event(new AssingPointsEvents(Auth::user()->id,$TicketsPackage->package_id));
        }
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

    public function factura($idTickets,$medio) {

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
        "ambiente" => 2, // 1: prueba; 2: produccion
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusApplys;
use App\Mail\PromoterAssing;
use App\Events\ContentAprovalEvent;
use App\Events\ContentDenialEvent;
use App\Events\PayementAprovalEvent;
use App\Events\PaymentDenialEvent;
use App\Events\PasswordPromoter;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use App\Events\AssingPointsEvents;
use File;



use App\User;
use App\TicketsPackage;
use App\Payments;
use App\PointsAssings;
use App\SistemBalance;
use App\Transactions;
use App\Referals;
use App\RollBacksTransacctions;

use App\Products;
use App\Rejection;

class SuperAdminController extends Controller
{
   //------------------------Panel de finanzas--------------------
   
	      public function ShowBusiness()
	      {
	         $Balance = SistemBalance::find(1);
	        
	         $Pack = TicketsPackage::first();

	         $Transactions = Transactions::take(5)->get();

	         $PointsAssings = PointsAssings::take(5)->get();

	         $User = User::where('points','>=',900)->take(5)->get();

           $UnRefered = User::all();
           
           $Data = collect(new User);

            foreach ($UnRefered as $key) 
              {
                if($key->UserRefered()->count()!=1)
                {
                    $Data->push($key);              
                }
              }

	         $Payments = Payments::take(1)->get();

	         return view('promoter.AdminModules.Business')
	        					->with('Balance', $Balance)
	        					->with('Payments', $Payments)
	        					->with('Users', $User)
	        					->with('PointsAssings', $PointsAssings)
                    ->with('UnRefereds', $Data)
	        					->with('Pack' ,$Pack);
	      }
   //-------------------------------------------------------------

   //-------------------Tiquets-----------------------------------
	  public function ShowTicketsDetail()
	  {
	  	return view('promoter.AdminModules.TicketsDetail');
	  }

	  public function TicketsSalesDataTable()
	  {
	  	$TicketsSales = Payments::where('status','=','Aprobado')->get();
        $TicketsSales->each(function($TicketsSales){
        $TicketsSales->Tickets;
        $TicketsSales->ticketsUser;
      });
        return response()->json($TicketsSales);
	  }

    public function TicketsRollBack($id)
    {
      $Payments = Payments::find($id);
      $Tickets = $Payments->value+$Payments->Tickets->amount;

      $RollBack= new RollBacksTransacctions;
      $RollBack->id_tickets_sales = $Payments->id;
      $RollBack->ammount_ticktes = $Tickets;
      $RollBack->save();

      $User=User::find($Payments->user_id);
      $User->credito = $User->credito - $Tickets;
      $User->save();


      $Balance = SistemBalance::find(1);
      $Balance->tickets_rolled=$Balance->tickets_rolled-$Tickets;
      $Balance->tickets_rolled=$Balance->tickets_solds-$Tickets;
      $Balance->save();

      return response()->json($User);

    }
   //-----------------------------------------------------------

   //----------------------Puntos----------------------------------
	 
	  public function ShowPointsDetails() {
	  	return view('promoter.AdminModules.PointsDetails');	
	  }

	  public function PointsSalesDataTable($status) {
      $Points = PointsAssings::where('status',$status)->get();
      $Points->each(function($Points){
        $Points->TracePointsFrom;
        $Points->TracePointsTo;
      });
      return response()->json($Points);
	  }

    public function PointsRollBack($id) {
      $Assing = PointsAssings::find($id);
      
      $RollBack = new RollBacksTransacctions;
      $RollBack->id_points_assing = $Assing->id;
      $RollBack->ammount_points = $Assing->amount;
      $RollBack->save();
      
      $Balance = SistemBalance::find(1);

      if ($Assing->to!=0) {
        $User = User::find($Assing->to);
        $User->points = $User->points-$Assing->amount;
        $User->save();  
      } else {
        $Balance->my_points = $Balance->my_points-$Assing->amount;
      }

      $Balance->points_rolled = $Balance->points_rolled+$Assing->amount;
      $Balance->save();

      $Assing->status = "Negado";
      $Assing->save();
      return response()->json($Assing);
    }
   //-------------------------------------------------------------

   //----------------------Usuarios---------------------------------
	  public function ShowUserDetails() {
	  	return view('promoter.AdminModules.UserDetails');	
	  }

    public function UnReferedUserDataTable() {
        $user = User::all();
        $user->each(function($user){
          $user->UserRefered;
        });
        return response()->json($user);


        return Datatables::of($Data)
                    ->addColumn('Transactions',function($Data){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Data->id.' data-toggle="modal" data-target="#myModal" id="Status">Ver</button';
                    })
                    ->editColumn('verify',function($Data){

                      if($Data->verify == 0){return 'No Verificado';}

                      return 'Verificado';
                    })
                    ->rawColumns(['Transactions'])
                      ->toJson();
    }

    public function valPatrocinador($codigo,$idUser) {
      $validarPatrocinador = $this->validarPatrocinador($codigo,$idUser);
      $user = User::find($idUser);
      $miCod = $user->codigo_ref;
      if ($miCod==$codigo) {
        return response()->json(1);
      } else {
        if ($validarPatrocinador==2) {
          return response()->json($validarPatrocinador);
        } else {
          $sponsor = User::where('codigo_ref',$codigo)->first();
          if ($sponsor) {
            return response()->json($sponsor);
          } else {
            return response()->json(0);
          }
        }
      }
    }

    public function validarPatrocinador($codigo,$idUser) {
      $ids = NULL;
      $cods = NULL;
      $user = User::find($idUser);
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

    public function assingRefered(Request $request) {
      $user = User::where('codigo_ref',$request->codigo)->where('id','<>',$request->idUser)->first();
      if ($user) {
        $referals = new Referals;
        $referals->user_id = $user->id;
        $referals->refered = $request->idUser;
        $referals->my_code = $request->codigo;
        $referals->save();
        return redirect()->action('SuperAdminController@ShowUserDetails');
      }
    }
   //---------------------------------------------------------------

   //------------------------Puntos Pendientes----------------------

    public function PendingPointsToLeipel()
    {
      $Users= User::all();
      $CurrentMonth=Carbon::now();
      $TotalP=0;
      $i=0;
      foreach ($Users as $User) 
      {
        if ($User->pending_points != 0) 
        {

          foreach ($User->Payments as $Payment) 
          {
            $LastPayment= Carbon::parse($Payment->created_at);

            if (!$LastPayment->isSameMonth($CurrentMonth)) 
            {
              $Assing = new PointsAssings;
              $Assing->amount = $User->pending_points;
              $Assing->from =  $User->id;
              $Assing->to =  0;
              $Assing->save();

              $balance= SistemBalance::find(1);
              $balance->my_points= $balance->my_points + $User->pending_points;

              $TotalP += $User->pending_points;
              $i++;

              $User->pending_points=0;
              $User->save();

              break;
            }
          
          }
        }
      }
        $json=['puntos'=>$TotalP,'usuarios'=>$i];
      return response()->json($json);
    }
   //---------------------------------------------------------------
  //------------------------------- Productos-------------------------------
  public function Products() {
    return view("promoter.AdminModules.Products");
  }

  public function storeProducts(Request $request) {
    Products::store($request);
    return redirect()->action("SuperAdminController@Products");
  }

  public function dataProducts($estatus) {
    $productos = Products::whereStatus($estatus);
    return response()->json($productos);
  }

  public function infoProduct($id) {
    $producto = Products::findProducto($id);
    $producto->imagen_prod = asset($producto->imagen_prod);
    $producto->pdf_prod = asset($producto->pdf_prod);
    return response()->json($producto);
  }

  public function updateProduct(Request $request) {
    Products::toUpdateProducts($request);
    return redirect()->action("SuperAdminController@Products");
  }

  public function deleteProduct($id){
    $producto = Products::deleteProducto($id);
    return response()->json($producto);
  }

  public function statusProduct(Request $request, $id) {
    $producto = Products::statusProduct($id,$request->status);
    if ($request->status=="Denegado") {
      $rejection = new Rejection;
      $rejection->module = "Products";
      $rejection->id_module = $id;
      $rejection->reason = $request->reason;
      $rejection->save();
    }
    /*
    if ($producto->bidder_id!=0) {
      $this->SendEmails($request->status,$producto->name,$producto->Bidder->email,$request->reason);
    }
    */
    return response()->json($producto);
  }
  //------------------------------- Productos-------------------------------
}

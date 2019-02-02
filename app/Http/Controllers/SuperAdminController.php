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

	         $Payments = Payments::take(5)->get();

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

         return Datatables::of($TicketsSales)
                    ->editColumn('user_id',function($TicketsSales){

                      return $TicketsSales->TicketsUser()->first()->name;
                    })
                    ->editColumn('package_id',function($TicketsSales){

                      return $TicketsSales->Tickets()->first()->name;
                    })
                    ->editColumn('voucher',function($TicketsSales){
                    	
                    	if ($TicketsSales->voucher != NULL) 
                    	{
                    		return 'Deposito';
                    	}
                      	return 'PayPhone';		
                      	
                      
                    })
                   ->editColumn('cost',function($TicketsSales){

                      return $TicketsSales->cost.'$';
                    })
                   ->editColumn('value',function($TicketsSales){

                      return $TicketsSales->value * $TicketsSales->Tickets()->first()->amount;
                    })
                    ->addColumn('Deshacer',function($TicketsSales){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Points->id.' data-toggle="modal" data-target="#myModal" id="Status">Deshacer</button';
                    })                  
                    ->toJson();

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



}

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
	 
	  public function ShowPointsDetails()
	  {
	  	return view('promoter.AdminModules.PointsDetails');	
	  }

	  public function PointsSalesDataTable()
	  {
		 $Points = PointsAssings::all();

         return Datatables::of($Points)
                    ->editColumn('from',function($Points){
                    	if ($Points->from == 0) 
                    		{
                    			return 'Leipel';	
                    		}	
                      	else
                      		{
                      		return $Points->TracePointsFrom()->first()->name;
                      		    
                      		}
                    })
                    ->editColumn('to',function($Points){

                      if ($Points->to == 0) 
                      {
                      	return 'Leipel';	
                      }
                      else
                      {
                       return $Points->TracePointsTo()->first()->name;
                      }
                    })
                     ->addColumn('Deshacer',function($Points){
                      
                      return '<button type="button" class="btn btn-theme" value='.$Points->id.' data-toggle="modal" data-target="#myModal" id="Status">Deshacer</button';
                    })                  
                    ->toJson();	  	
	  }

    public function PointsRollBack($id)
    {
      $Assing = PointsAssings::find($id);
      
      $RollBack= new RollBacksTransacctions;
      $RollBack->id_points_assing = $Assing->id;
      $RollBack->ammount_points = $Assing->amount;
      $RollBack->save();
      
      $Balance = SistemBalance::find(1);

      if ($Assing->to!=0) 
      {
        $User=User::find($Assing->to);
        $User->points = $User->points - $Assing->amount;
        $User->save();  
      }
      else
      {
        $Balance->my_points=$Balance->my_points-$Assing->amount;
      }

      $Balance->points_rolled=$Balance->points_rolled+$Assing->amount;
      $Balance->save();
      
      
     return response()->json($User);      
    }
   //-------------------------------------------------------------

   //----------------------Usuarios---------------------------------
	  public function ShowUserDetails()
	  {
	  	return view('promoter.AdminModules.UserDetails');	
	  }

    public function UnReferedUserDataTable()
    {
        $Data = User::all();


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
   //---------------------------------------------------------------



}
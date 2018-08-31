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

	         $Payments = Payments::take(5)->get();

	         return view('promoter.AdminModules.Business')
	        					->with('Balance', $Balance)
	        					->with('Payments', $Payments)
	        					->with('Users', $User)
	        					->with('PointsAssings', $PointsAssings)
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
                    	
                    	if ($TicketsSales->voucher==0) 
                    	{
                    		return 'PayPhone';
                    	}
                      	else
                      	{
                      		return 'Deposito';		
                      	}
                      
                    })
                   ->editColumn('cost',function($TicketsSales){

                      return $TicketsSales->cost.'$';
                    })
                   ->editColumn('value',function($TicketsSales){

                      return $TicketsSales->value * $TicketsSales->Tickets()->first()->amount;
                    })
                    
                    ->toJson();

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
                    ->toJson();	  	
	  }
   //-------------------------------------------------------------

   //----------------------Usuarios---------------------------------
	  public function ShowUserDetails()
	  {
	  	return view('promoter.AdminModules.UserDetails');	
	  }
   //---------------------------------------------------------------



}

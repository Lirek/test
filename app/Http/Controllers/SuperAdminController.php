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
	        					->with('User', $User)
	        					->with('PointsAssings', $PointsAssings)
	        					->with('Pack' ,$Pack);


	      }
   //-------------------------------------------------------------
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\ExternalClients;
use App\User;
use App\ExternalPayments;

use Auth;


class ExternalOperationsController extends Controller
{
    
    public function ShowPaymentForm(Request $request)
    {
        try 
    	{	
			$ExternalClient=ExternalClients::where('client_secret_id','=',$request->secret_id)->firstOrfail();    		
    		
    		$points = round($request->payment);
    		
    		$Transaction = new ExternalPayments;
    		$Transaction->client_id = $ExternalClient->id; 
            $Transaction->points = $points;
            $Transaction->payment = $request->payment;
            $Transaction->user_id = Auth::user()->id;
            $Transaction->transaction_id = $request->transaction_id;
    		$Transaction->save();
    		
            return view('users.ExternalPayment')->with('payment',$request->payment)
                                                ->with('points',$points)
                                                ->with('external',$ExternalClient)
                                                ->with('transaction',$Transaction->id);

    	} 
    	catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exeption) 
    	{
    		return response()->json('No existe el Cliente',204);
    	}
    }

    public function ProcessPayment(Request $request)
    {
    	$Transaction = ExternalPayments::find($request->id);
    	
    	$client = new Client();
    	
    	$token = $Transaction->Client()->client_token;
    	
    	$callback = $Transaction->Client()->callback_url;

    	$user=User::find($Transaction->user_id);

    	if ($user->points >= $Transaction->points) 
    	{
    	    $Transaction->status='Aprobado';
    		
    		$Transaction->save();
    	}

    	else
    	{
    		$Transaction->status='Denegado';
    		
    		$Transaction->save();	
    	}
    	
    }
}

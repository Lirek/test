<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use App\ExternalClients;

class ExternalOperationsController extends Controller
{
    public function PointsPayment(Request $request)
    {
    	$ExternalClient=ExternalClients::where('client_secret_id','=',$request->secret_id)->firstOrfail();

    	$client = new Client();

    	$User= User::where('email','=',$request->user)->firstOrfail();

    	if ($ExternalClient->petition_url != $request->url()) 
    	{
    		return Mail::raw('Se Ha registrado una transsaccion de su sitio desde un url no valido: '.$request->url(), function ($message) {
    		
    		    $message->to($ExternalClient->admin_email, $ExternalClient->client_name);    		
    		    $message->replyTo('leipel@leipel.com', 'Webmaster');
    		    $message->subject('Transsacion Sospechosa');
    		});
    	}
    	else
    	{
	    	if ($User->credito < $request->points) 
	    	{

	    		return $client->post($ExternalClient->callback_url,
	    			[
		    			'form_params' => [
		        							'status' => 'Error',
		        							'message' => 'No Posee suficientes Puntos para la transaccion',
		        							'token'=> $ExternalClient->client_token,
		        						 ]

	        		]);
	    	}
	    	else
	    	{
				$User= $User->credito - $request->points;
				$User->save();

	    		return $client->post($ExternalClient->callback_url,
	    			[
		    			'form_params' => [
		        							'status' => 'Success',
		        							'message' => 'Se han debitado Existosamente',
		        							'token'=> $ExternalClient->client_token,
		        						 ]

	        		]);
	    	}
    	}
    }
    
}

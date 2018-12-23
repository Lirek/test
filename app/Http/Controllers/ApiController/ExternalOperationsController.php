<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\ExternalClients;
use App\User;

class ExternalOperationsController extends Controller
{
    public function PointsPayment(Request $request)
    {
    	try 
    	{	
    		$ExternalClient=ExternalClients::where('client_secret_id','=',$request->secret_id)->firstOrfail();

    	} 
    	catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exeption) 
    	{
    		
    		return response()->json('No existe el Cliente',204);
    	}

	
		try {
			$User= User::where('email','=',$request->user)->firstOrfail();

			} 
		catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exeption) 
			{
				return response()->json('No existe el Usuario',204);
			}
    	
    	$client = new Client();

    	
    	

    	if ($ExternalClient->petition_url != $request->url()) 
    	{
    		
    		Log::debug('Se Ha registrado una transsaccion de su sitio desde un url no valido:'.$request->url().'para el cliente:'.$ExternalClient->client_name);

    		// Mail::raw('Se Ha registrado una transsaccion de su sitio desde un url no valido: '.$request->url(), function ($message) {
    		
    		//     $message->to($ExternalClient->admin_email, $ExternalClient->client_name);    		
    		//     $message->replyTo('leipel@leipel.com', 'Webmaster');
    		//     $message->subject('Transsacion Sospechosa');
    		// });
   
			return redirect()->back();
    	}
    	else
    	{
	    	if ($User->credito < $request->points) 
	    	{

	    			$client->post($ExternalClient->callback_url,
	    			[
		    			'form_params' => [
		        							'status' => 'Error',
		        							'message' => 'No Posee suficientes Puntos para la transaccion',
		        							'token'=> $ExternalClient->client_token,
		        						 ]

	        		]);
	        return redirect()->back();

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

    public function test()
    {
    	
    	$client = new Client();

    	return $client->post('https://wwww.sistema1.skytec-sa.com/api/payment_test',
	    			[
		    			'form_params' => [
		        							'status' => 'Error',
		        							'message' => 'No Posee suficientes Puntos para la transaccion',
		        							'token'=> $ExternalClient->client_token,
		        						 ]

	        		]);
    }
    
}

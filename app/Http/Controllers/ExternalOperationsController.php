<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Events\TransactionToken;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\ExternalClients;
use App\User;
use App\ExternalPayments;
use App\Bidder;

use Auth;


class ExternalOperationsController extends Controller
{

    public function ShowPaymentForm(Request $request)
    {
        try
    	{
			$ExternalClient=ExternalClients::where('client_secret_id','=',$request->secret_id)->firstOrfail();

    		$user= User::where('email','=',$request->email)->firstOrfail();

    		$points = round($request->payment);

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $token = '';

           for ($i = 0; $i < 6; $i++)
              {
                $token .= $characters[rand(0, $charactersLength - 1)];

              }

    		$Transaction = new ExternalPayments;
    		$Transaction->client_id = $ExternalClient->id;
            $Transaction->points = $points;
            $Transaction->payment = $request->payment;
            $Transaction->user_id = $user->id;
            $Transaction->transaction_id = $request->transaction_id;
            $Transaction->token_s = $token;
    		$Transaction->save();

            Auth::loginUsingId($user->id);
            Event(new TransactionToken($user->email,$token,$points));

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

    	$client = new Client(['headers' => ['Content-Type' => 'application/json']]);

    	$token = $Transaction->Client->client_token;

    	$callback = $Transaction->Client->callback_url;

    	$user=User::find($Transaction->user_id);

    	if ($user->points > $Transaction->points)
    	{

    	    if($request->token == $Transaction->token_s)
    	    {
    	        $now=Carbon::now();
                $diff = $now->diffInMinutes($Transaction->created_at);

        	    if($diff<10)
        	    {
                  $Bidder = Bidder::find($Transaction->Client()->id);
                  $Bidder = $Bidder->points + $Transaction->points;
                  $user->points = $user->points - $Transaction->points;
                  $user->save();
                  $Bidder->save();
                  $Transaction->status='Aprobado';
            		  $Transaction->save();

            		$response = $client->post('https://webhook.site/dce6c47a-7b78-49c8-918c-fa1c3a244827',
    		                                    [
    		                                     'json' => [
        		                                         [
            		                                     'token' => $token,
            		                                     'transaction_id' => $Transaction->transaction_id,
            		                                     'status' => $Transaction->status
            		                                     ]
        		                                     ]
        		                                  ]
        		                                  );
        	    }
        	    else
        	    {
        	        $response = $client->post('https://webhook.site/dce6c47a-7b78-49c8-918c-fa1c3a244827',
    		                                    [
    		                                     'json' => [
        		                                         [
            		                                     'token' => $token,
            		                                     'transaction_id' => $Transaction->transaction_id,
            		                                     'status' => $Transaction->status,
            		                                     'error' => 'Token Vencido'
            		                                     ]
        		                                     ]
        		                                  ]
        		                                  );
        		      return view('users.ExternalPaymentResult')->with('msg', 'Error de Transaccion');
        	    }

        	}

          else
          {
              return Redirect::back()->withErrors(['msg', 'Token Invalido Intente Nuevamente']);
          }
    	}

    	else
    	{

    		$response = $client->post('https://webhook.site/dce6c47a-7b78-49c8-918c-fa1c3a244827',
    		                                    [
    		                                     'json' => [
        		                                         [
            		                                     'token' => $token,
            		                                     'transaction_id' => $Transaction->transaction_id,
            		                                     'status' => $Transaction->status,
            		                                     'error' => 'saldo insuficiente'
            		                                     ]
        		                                     ]
        		                                  ]
        		                                  );

                                              return view('users.ExternalPaymentResult')->with('msg', 'Saldo Insuficiente');

    	}

    }

    public function LoginPayment(Request $request)
    {
        $payment = Crypt::decryptString($request->x1);
        $external = Crypt::decryptString($request->x2);
        $transaction = Crypt::decryptString($request->x3);
        $points = Crypt::decryptString($request->x4);
        $token = Crypt::decryptString($request->x5);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
          $ExternalClient=ExternalClients::where('client_secret_id','=',$external)->firstOrfail();

          $Transaction = new ExternalPayments;
          $Transaction->client_id = $ExternalClient->id;
          $Transaction->points = $points;
          $Transaction->payment = $request->payment;
          $Transaction->user_id = Auth::user()->id;
          $Transaction->transaction_id = $request->transaction_id;
          $Transaction->token_s = $token;
          $Transaction->save();

            Event(new TransactionToken(Auth::user()->email,$token,$points));

            return view('users.ExternalPayment')->with('payment',$payment)
                                                ->with('points',$points)
                                                ->with('external',$ExternalClient)
                                                ->with('transaction',$Transaction->id);
        }
    }

    public function showPayments()
    {
      $Bidder = Bidder::find(Auth::guard('bidder')->user()->id);
      $ExternalClients = $Bidder->PayementsCredentials()->first();
      dd($ExternalClients);
      return view('bidder.PaymentsPanel')->with('client_secret_id', $ExternalClients->client_secret_id)
                                         ->with('client_token', $ExternalClients->client_token)
                                         ->with('callback_url', $ExternalClients->callback_url)
                                         ->with('petition_url', $ExternalClients->petition_url)
                                         ->with('url_host', $ExternalClients->url_host);
    }

    public function PaymentsDataTable()
    {
      $Bidder = Bidder::find(Auth::guard('bidder')->user()->id);
      $ExternalClients = $Bidder->PayementsCredentials()->first();
      $Payments =ExternalPayments::where('client_id', '=',$ExternalClients->id)->get();
      return Datatables::of($Payments)
                          ->addColumn('email',function($Payments){
                            return $Payments->Client()->email;
                          })
                            ->toJson();
    }
}

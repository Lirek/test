<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Auth;
use App\ExternalClients;

class ExternalClientsController extends Controller
{
    public function ViewExternalClients()
    {
        return view('promoter.AdminModules.ExternalClients');
    }

    public function ExternalClientsDataTable()
    {
    	$ExternalClients = ExternalClients::all();

         return Datatables::of($ExternalClients)

         					->addColumn('Actions',function($ExternalClients){

                            return '<button type="button" class="btn-danger" value='.$ExternalClients->id.' data-toggle="modal" data-target="#DeleteClient" id="delete">Eliminar</button>

                            <button type="button" class="btn btn-theme" value='.$ExternalClients->id.' data-toggle="modal" data-target="#UpdateClient" id="edit">Modificar</button';
                          })->rawColumns(['Actions'])
         					->toJson();
    }

    public function SaveExternalClients(Request $request)
    {
  		$ExternalClients= new ExternalClients;
  		$ExternalClients->client_name = $request->client_name;
  		$ExternalClients->petition_url = $request->petition_url;
  		$ExternalClients->admin_email = $request->admin_email;
  		$ExternalClients->url_host = $request->url_host;
  		$ExternalClients->callback_url = $request->callback_url;

  		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                   $charactersLength = strlen($characters);
                   $randomString1 = '';
                   $randomString2 = '';

                     for ($i = 0; $i < 20; $i++)
                        {
                          $randomString1 .= $characters[rand(0, $charactersLength - 1)];

                          $randomString2 .= $characters[rand(0, $charactersLength - 1)];
                        }

  		$ExternalClients->client_token = $randomString1;
  		$ExternalClients->client_secret_id = $randomString2;

  		$ExternalClients->save();

  		return response()->json($ExternalClients);
    }

    public function UpdateExternalClient($id, Request $request)
    {
		    $ExternalClients= ExternalClients::find($id);
		      $ExternalClients->client_name = $request->client_name_u;
		        $ExternalClients->petition_url = $request->petition_url_u;
		          $ExternalClients->admin_email = $request->admin_email_u;
		            $ExternalClients->url_host = $request->url_host_u;
		              $ExternalClients->callback_url = $request->callback_url_u;

		                $ExternalClients->save();

		                  return redirect()->action('ExternalClientsController@ViewExternalClients');
    }

    public function GetExternalClient($id)
    {
		    $ExternalClient= ExternalClients::find($id);
    	return response()->json($ExternalClient);
    }

    public function DeleteExternalClient($id,Request $request)
    {
		    $ExternalClient= ExternalClients::destroy($id);
		      return redirect()->action('ExternalClientsController@ViewExternalClients');

    }

    public function CreatePaymentCredentials(Request $request)
    {
      $ExternalClients= new ExternalClients;
      $ExternalClients->bidder_id = Auth::guard('bidder')->user()->id;
      $ExternalClients->petition_url = $request->petition_url;
      $ExternalClients->url_host = $request->url_host;
      $ExternalClients->callback_url = $request->callback_url;

      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                   $charactersLength = strlen($characters);
                   $randomString1 = '';
                   $randomString2 = '';

                     for ($i = 0; $i < 20; $i++)
                        {
                          $randomString1 .= $characters[rand(0, $charactersLength - 1)];

                          $randomString2 .= $characters[rand(0, $charactersLength - 1)];
                        }

      $ExternalClients->client_token = $randomString1;
      $ExternalClients->client_secret_id = $randomString2;

      $ExternalClients->save();
      return response()->json($ExternalClients);
    }
}

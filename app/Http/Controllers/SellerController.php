<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Seller Model
use App\Seller;
use App\ApplysSellers;

class SellerController extends Controller
{

    //Funcion Encargada de Cargar el Formulario para el Registro que completo
    public function CompleteRegistrationForm($id,$code)
    {
    	$ApplysSellers = ApplysSellers::find($id);
        
        if ($code == $ApplysSellers->token) 
        {
            return view('seller.complete');    
        }
        else
        {
          return view('seller.auth.login');   
        }
        
    }

	//Funcion Encargada de Cargar los datos del formulario a la BD para el Registro que completo

    public function CompleteRegistration(Request $request)
    {
    	
    	$id=$request->id;
        $image =$request->file('adj_ruc');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/productor/'.$id);
    	$seller = Seller::find($id);
        $seller_modules;
        

        $seller->tlf = $request->tlf;
        $seller->descs_s = $request->dsc;
        $seller->estatus = 'Pre-Aprobado';
        $seller->ruc_s = $request->ruc;
        $seller->adj_ruc =$image->move($destinationPath, $input['imagename']);
        $seller->save();
    
    	return view('seller.home');
    }

    public function ShowMessages()
    {
        $user=Auth::guard('web_seller')->user()->id;
        
        return view('seller.messages');
    }
    
}
	
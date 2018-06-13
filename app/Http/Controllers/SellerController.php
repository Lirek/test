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
        
        
        $store_path='documents/sellers/';      
        
        $path = $request->file('adj_ruc')->storeAs($store_path,$request->name.'.'.$request->file('adj_ruc')->getClientOriginalExtension());
    	$Seller= new Seller;
        $Seller->name = $request->name;
        $Seller->email = $request->email;
        $Seller->password = bcrypt($request->password);
        $Seller->estatus = 'Pre-Aprobado';
        $Seller->ruc_s = $request->ruc;
        $Seller->descs_s = $request->dsc;
        $Seller->adj_ruc = $path;
        $Seller->tlf = $request->tlf;
        $Seller->save();
        Auth::guard('web_seller')->login($Seller);

    
    	return view('seller.home')->with('total_content', 0)->with('aproved_content', 0)->with('followers', 0);
    }

    public function ShowMessages()
    {
        $user=Auth::guard('web_seller')->user()->id;
        
        return view('seller.messages');
    }
    
}
	
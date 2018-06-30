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
use Laracasts\Flash\Flash;

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

    public function edit($id)
    {
        $sellers = Seller::find($id);

        return view('seller.producer.edit')->with('seller',$sellers);
    }

    public function update(Request $request,$id)
    {
        $seller = Seller::find($id);

        if ($request->logo <> null) {
            $file = $request->file('logo');
            $name = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/producer/logo';
            $file->move($path, $name);
            $seller->logo = $name;
        }

        if ($request->adj_ruc <> null) {
            $file1 = $request->file('adj_ruc');
            $name1 = 'ruc_' . time() . '.' . $file1->getClientOriginalExtension();
            $path1 = public_path() . '/images/producer/ruc';
            $file1->move($path1, $name1);
            $seller->adj_ruc = $name1;
        }

        if ($request->adj_ci <> null) {
            $file2 = $request->file('adj_ci');
            $name2 = 'ci_' . time() . '.' . $file2->getClientOriginalExtension();
            $path2 = public_path() . '/images/producer/ci';
            $file2->move($path2, $name2);
            $seller->adj_ci = $name2;
        }

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->tlf = $request->tlf;
        $seller->ruc_s = $request->ruc_s;

        $seller->save();

        Flash::warning('Se ha modificado ' . $seller->name . ' de forma exitosa')->important();

        return view('seller.producer.edit')->with('seller',$seller);
    }
    
}
	
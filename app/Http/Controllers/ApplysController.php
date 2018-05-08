<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplysSellers;

class ApplysController extends Controller
{
    public function ShowApplysForm()
    {
       return view('seller.auth.applys');
    }

    public function SubmitApp (Request $request)
    {
        
    	$applys = new ApplysSellers;
        $applys->name_c = $request->com_name;
        $applys->contact_s = $request->contact_name;
        $applys->phone_s = $request->tlf;
        $applys->email = $request->email;
        $applys->save();
        flash('Su Solicitud Sera Procesada')->success();
        return view('seller.auth.applys');

    
    }

}

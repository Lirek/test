<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplysSellers;
use Laracasts\Flash\Flash;
use App\Mail\ApprovalNotification;
use Illuminate\Support\Facades\Mail;

class ApplysController extends Controller
{
    public function ShowApplysForm()
    {
       return view('seller.auth.applys');
    }

    public function SubmitApp (Request $request) {
        $applys = new ApplysSellers;
        
        $applys->name_c = $request->com_name;
        $applys->contact_s = $request->contact_name;
        $applys->phone_s = $request->tlf;
        $applys->email = $request->email;
        $applys->desired_m = $request->content_type;
        if ($request->content_type=='Musica') {
            $applys->sub_desired_m = $request->sub_desired_musica;
        }
        if ($request->content_type=='Libros') {
            $applys->sub_desired_m = $request->sub_desired_libros;
        }
        $applys->dsc = $request->description;
        
        $applys->save();

        $emailAdmin = "bcastillo@leipel.com";
        $motivo = "Usuario proveedor pendiente por aprobar";
        Mail::to($emailAdmin)->send(new ApprovalNotification($motivo));
        
        return response()->json($request->all());
    
    }

}

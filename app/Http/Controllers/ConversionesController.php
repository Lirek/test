<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Conversion;

class ConversionesController extends Controller
{
    public function conversiones() {
    	$valorPunto = Conversion::valorPunto();
    	$valorTicket = Conversion::valorTicket();
    	return view('promoter.AdminModules.Conversion')->with('valorPunto',$valorPunto)->with('valorTicket',$valorTicket);
    }

    public function conversion(Request $request) {
		$conversion = Conversion::ajuste($request);
    	return response()->json($conversion);
    }

    public function historialCosto($tipo) {
    	$historial = Conversion::historial($tipo);
    	return view('promoter.AdminModules.HistorialCosto')->with('historial',$historial)->with('tipo',$tipo);
    }
}

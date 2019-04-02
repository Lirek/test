<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

use App\Bidder;
use App\Rejection;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusPayments;

class PaymentsBidder extends Model
{
    protected $table = 'payments_bidder';

    protected $fillable = [
    	'id',
    	'bidder_id',
    	'points',
    	'factura',
    	'fecha_cita',
    	'status'
    ];

    public function Bidder() {
        return $this->belongsTo('App\Bidder', 'bidder_id');
    }

    public static function store($idBidder,$request) {
    	$file = $request->file("factura");
        $name = "factura_".time().".".$file->getClientOriginalExtension();
        $path = public_path()."/bidders/".Auth::guard('bidder')->user()->ruc."/facturas/";
        $file->move($path, $name);
    	$payments = new PaymentsBidder();
    	$payments->bidder_id = $idBidder;
    	$payments->points = $request->cantidad;
    	$payments->status = "Por cobrar";
        $payments->factura = "/bidders/".Auth::guard('bidder')->user()->ruc."/facturas/".$name;
    	$payments->save();
    }

    public static function infoPayments($status) {
        return self::where('status',$status)->get();
    }

    public static function payment($request,$idPago) {
    	$payment = self::find($idPago);
    	$email = $payment->bidder->email;
    	$message = $request->message;
    	$bidder = Bidder::find($payment->bidder_id);

    	if ($request->status == 'Por cobrar') {
    		$payment->status = 'Diferido';
    		$hoy = date('Y-m-d');
    		$cita = strtotime('+2 day',strtotime($hoy));
    		$cita = date('Y-m-d',$cita);
    		$payment->fecha_cita = $cita;
    	} elseif ($request->status == 'Diferido') {
    		$payment->status = 'Pagado';
    	} else {
    		$rejection = new Rejection;
    		$rejection->module = "Payments Bidder";
    		$rejection->id_module = $idPago;
    		$rejection->reason = $message;
    		$rejection->save();
    		$bidder->points = $bidder->points + $payment->points;
    		$payment->status = 'Rechazado';
    	}
    	$bidder->save();
    	$payment->save();
    	Mail::to($email)->send(new StatusPayments($payment->fecha_cita,$request->status,$message));
    	return response()->json($payment);
    }

    public static function payments($status) {
    	if ($status=="Pagado") {
    		return $payment = self::where('bidder_id',Auth::guard('bidder')->user()->id)->where('status',$status)->orderBy('created_at','desc')->get();
    	} else {
    		return $payment = self::where('bidder_id',Auth::guard('bidder')->user()->id)->where('status','Por cobrar')->orWhere('status','Diferido')->orderBy('created_at','desc')->get();
    	}
    }
}

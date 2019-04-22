<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Bidder;
use App\Rejection;
use App\BidderRoles;
use App\PaymentsBidder;
use App\Conversion;

use App\Events\StatusBidderEvent;

class BidderController extends Controller
{
    public function home() {
        return view('bidder.home');
    }

    public function store(Request $request) {
    	Bidder::store($request);
    	return response()->json($request->all());
    }

    public function valEmailBidder($email) {
    	$val = Bidder::valEmail($email);
    	if ($val) {
    		return response()->json($val->email);
    	} else {
    		return response()->json(1);
    	}
    }

    public function Bidder() {
        $modules = BidderRoles::all();
        return view("promoter.AdminModules.Bidder")->with('modules',$modules);
    }

    public function bidderByStatus($estatus) {
        $bidder = Bidder::bidderByStatus($estatus);
        $bidder->each(function($bidder){
            $bidder->roles;
        });
        return response()->json($bidder);
    }

    public function statusBidder(Request $request,$id) {
        $bidder = Bidder::statusBidder($id,$request->status);
        if ($request->status=="Denegado") {
            $rejection = new Rejection;
            $rejection->module = "Bidder";
            $rejection->id_module = $id;
            $rejection->reason = $request->reason;
            $rejection->save();
        } 
        event(new StatusBidderEvent($bidder,$request->reason));
        return response()->json($bidder);
    }

    public function bidderComplete($id,$token) {
        $bidder = Bidder::find($id);
        if ($bidder!=null) {
            if ($bidder->status=="Pre-Aprobado") {
                $val = 0;
                if ($bidder->token===$token) {
                    $val = $bidder->toJson();
                }
            } else {
                $val = 1;
            }
        } else {
            $val = 2;
        }
        return view("bidder.complete")->with('valBidder',$val);
    }

    public function BidderCompleteRegister(Request $request) {
        $bidder = Bidder::complete($request);
        Auth::guard('bidder')->login($bidder);
        return redirect()->action(
            'BidderController@home'
        );
    }

    public function addModuleBidder(Request $request) {
        $bidder = Bidder::addModule($request);
        return response()->json($bidder);
    }

    public function deleteModuleBidder($idBidder,$idModule) {
        $bidder = Bidder::deleteModule($idBidder,$idModule);
        return response()->json($bidder);
    }

    public function retiro($status=null) {
        $id = Auth::guard('bidder')->user()->id;
        $diferido = PaymentsBidder::where('bidder_id',$id)->where('status','Diferido')->orWhere('status','Por cobrar')->sum('points');
        $pagado = PaymentsBidder::where('bidder_id',$id)->where('status','Pagado')->sum('points');
        $valorPunto = Conversion::valorPunto();
        if ($status) {
            return view('bidder.retiro')->with('status',$status)->with('diferido',$diferido)->with('pagado',$pagado)->with('valorPunto',$valorPunto);
        } else {
            return view('bidder.retiro')->with('status',0)->with('diferido',$diferido)->with('pagado',$pagado)->with('valorPunto',$valorPunto);
        }
    }

    public function retirar(Request $request) {
        $user = Bidder::find(Auth::guard('bidder')->user()->id);
        PaymentsBidder::store($user->id,$request);
        $user->points = $user->points - $request->cantidad;
        $user->save();
        return redirect()->action(
            'BidderController@retiro',['status'=>true]
        );
    }

    public function paymentsBidder() {
        return view('promoter.AdminModules.PaymentsBidder');
    }

    public function infoPaymentsBidder($status) {
        $pagos = PaymentsBidder::infoPayments($status);
        $pagos->each(function($pagos){
            $pagos->Bidder;
        });
        return response()->json($pagos);
    }

    public function infoBidder($idBidder) {
        $info = Bidder::find($idBidder);
        return response()->json($info);
    }

    public function bidderPayments(Request $request,$idPago) {
        $pago = PaymentsBidder::payment($request,$idPago);
        return response()->json($pago);
    }

    public function viewPayments($status){
        $pagos = PaymentsBidder::payments($status);
        return response()->json($pagos);
    }
}

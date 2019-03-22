<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use App\Bidder;
use App\Rejection;
use App\BidderRoles;

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
}

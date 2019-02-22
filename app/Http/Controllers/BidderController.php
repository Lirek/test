<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Bidder;

class BidderController extends Controller
{
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
}

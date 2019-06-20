<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidderAccess extends Model
{
    protected $table = "bidding_access";
    protected $fillable = [
    	'bidding_id',
    	'modules_id'
	];

    public static function addModule($request) {
        $bidder = new BidderAccess;
        $bidder->bidding_id = $request->idBidder;
        $bidder->modules_id = $request->access;
        $bidder->save();
        return $bidder;
    }
}

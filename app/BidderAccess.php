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
}

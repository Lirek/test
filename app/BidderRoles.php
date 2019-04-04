<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidderRoles extends Model
{
    protected $table = "bidding_modules";
    protected $fillable = [
    	'id',
    	'name'
	];

	public function roles() {
        return $this->belongsToMany('App\BidderRoles','BidderAccess','bidding_id','modules_id');
    }
}

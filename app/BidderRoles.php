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

    public static function store($request) {
    	$categoria = new BidderRoles;
    	$categoria->name = ucfirst($request->categoria);
    	$categoria->save();
    }

    public static function infoModule($idModule) {
    	return self::find($idModule);
    }

    public static function updateModule($request) {
    	$categoria = self::find($request->module);
    	$categoria->name = ucfirst($request->categoria);
    	$categoria->save();
    }

    public static function deleteModule($idModule) {
    	self::destroy($idModule);
    }
}

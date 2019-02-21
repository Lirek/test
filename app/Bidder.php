<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\ApprovalNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bidder extends Authenticatable
{
    protected $table = 'bidder';
    protected $fillable = [
    	'id',
    	'email',
    	'name',
    	'password',
    	'ruc',
    	'imagen_ruc',
    	'logo',
    	'points',
    	'status',
    	'account_status'
    ];

    public static function store($request) {
    	$bidder = new Bidder;
    	$bidder->name = $request->nombreOfertante;
    	$bidder->ruc = $request->rucOfertante;
    	$bidder->email = strtolower($request->emailRO);
    	$bidder->save();
    }

    public static function valEmail($email) {
    	return self::where('email',$email)->first();
    }

}

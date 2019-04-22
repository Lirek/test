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
        'pendding_points',
    	'status',
        'token',
    	'account_status'
    ];

    public function roles() {
        return $this->belongsToMany('App\BidderRoles','bidding_access','bidding_id','modules_id');
    }

    public function Bidder() {
      return $this->hasMany('App\Bidder','bidder_id');
    }

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

    public static function bidderByStatus($estatus) {
        return self::where('status',$estatus)->get();
    }

    public static function statusBidder($id, $status) {
        $bidder = self::find($id);
        if ($bidder->status!="Aprobado") {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $bidder->token = $randomString;
        }
        $bidder->status = $status;
        $bidder->save();
        return $bidder;
    }

    public static function complete($request) {
        $logo = $request->file('adj_logo');
        $nameLogo = "logo_".time().".".$logo->getClientOriginalExtension();
        $pathLogo = public_path()."/bidders/".$request->ruc."/logo/";
        $logo->move($pathLogo,$nameLogo);
        $logo_bidder = "/bidders/".$request->ruc."/logo/".$nameLogo;

        $ruc = $request->file('adj_ruc');
        $nameRuc = "ruc_".time().".".$ruc->getClientOriginalExtension();
        $pathRuc = public_path()."/bidders/".$request->ruc."/ruc/";
        $ruc->move($pathRuc,$nameRuc);
        $ruc_bidder = "/bidders/".$request->ruc."/ruc/".$nameRuc;

        $bidder = self::find($request->id);
        $bidder->ruc = $request->ruc;
        $bidder->imagen_ruc = $ruc_bidder;
        $bidder->logo = $logo_bidder;
        $bidder->password = bcrypt($request->password);
        $bidder->status = "Aprobado";
        $bidder->save();
        return $bidder;
    }

    public static function addModule($request) {
        $bidder = self::find($request->idBidder);
        $modules = $bidder->roles()->attach($request->access);
        return $bidder;
    }

    public static function deleteModule($idBidder,$idModule) {
        $bidder = self::find($idBidder);
        $modules = $bidder->roles()->detach($idModule);
        return $bidder;
    }
}

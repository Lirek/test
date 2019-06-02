<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\ApprovalNotification;
use Illuminate\Support\Facades\Mail;

use Auth;
use File;

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
        'address',
        'phone',
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

    public function Products() {
        return $this->hasMany('App\Products','bidder_id');
    }

    public function PayementsCredentials() {
        return $this->hasMany('App\ExternalClients','bidder_id');
    }

    public static function store($request) {
    	$bidder = new Bidder;
    	$bidder->name = $request->nombreOfertante;
    	$bidder->phone = $request->tlfRO;
    	$bidder->email = strtolower($request->emailRO);
        if ($request->categoria!="otra") {
            $bidder->save();
            $bidder->roles()->attach($request->categoria);
        } else {
            $bidder->description = $request->otraCategoria;
            $bidder->save();
        }
    }

    public static function valEmail($email) {
    	return self::where('email',$email)->first();
    }

    public static function bidderByStatus($estatus) {
        return self::where('status',$estatus)->orderBy('created_at','desc')->get();
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
        $bidder->phone = $request->tlf;
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

    public static function actualizar($request) {
        $bidder = self::find(Auth::guard('bidder')->user()->id);
        $bidder->name = $request->nombre;
        $bidder->email = $request->correo;
        $bidder->ruc = $request->ruc;
        $bidder->address = $request->direccion;
        $bidder->phone = $request->telefono;
        if ($request->adj_ruc!=null) {
            File::delete(public_path().$bidder->imagen_ruc);

            $ruc = $request->file('adj_ruc');
            $nameRuc = "ruc_".time().".".$ruc->getClientOriginalExtension();
            $pathRuc = public_path()."/bidders/".$bidder->ruc."/ruc/";
            $ruc->move($pathRuc,$nameRuc);
            $ruc_bidder = "/bidders/".$bidder->ruc."/ruc/".$nameRuc;

            $bidder->imagen_ruc = $ruc_bidder;
        }
        $bidder->save();
    }

    public static function actualizarImagenPerfil($request) {
        $bidder = self::find(Auth::guard('bidder')->user()->id);
        File::delete(public_path().$bidder->logo);

        $logo = $request->file('adj_logo');
        $nameLogo = "logo_".time().".".$logo->getClientOriginalExtension();
        $pathLogo = public_path()."/bidders/".$bidder->ruc."/logo/";
        $logo->move($pathLogo,$nameLogo);
        $logo_bidder = "/bidders/".$bidder->ruc."/logo/".$nameLogo;

        $bidder->logo = $logo_bidder;
        $bidder->save();
    }

    public static function actualizarClave($request) {
        $bidder = self::find(Auth::guard('bidder')->user()->id);
        if(password_verify($request->claveActual, $bidder->password)){
            $bidder->password = bcrypt($request->claveNueva);
            $bidder->save();
            return true;
        } else {
            return flase;
        }
    }

    public static function deleteAccount() {
        $bidder = self::find(Auth::guard('bidder')->user()->id);
        $bidder->account_status = "closed";
        $bidder->save();
        Auth::guard('bidder')->logout();
    }
}

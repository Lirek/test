<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversion';

    protected $fillable = [
    	'id',
    	'tipo',
    	'costo',
    	'desde',
    	'hasta'
    ];

    public static function valorPunto() {
    	$valorPunto = self::where('tipo','punto')->where('hasta',null)->first();
    	if ($valorPunto!=null) {
    		return $valorPunto = $valorPunto->costo;
    	} else {
    		return $valorPunto = 0;
    	}
    }

    public static function valorTicket() {
    	$valorTicket = self::where('tipo','ticket')->where('hasta',null)->first();
    	if ($valorTicket!=null) {
    		return $valorTicket = $valorTicket->costo;
    	} else {
    		return $valorTicket = 0;
    	}
    }

    public static function ajuste($request) {
    	$info = self::where('tipo',$request->tipo)->where('hasta',null)->get();
    	$conversion = self::find($info[0]->id);
    	$conversion->hasta = date('Y-m-d');
    	$conversion->save();
    	$conversion = new Conversion;
    	$conversion->tipo = $request->tipo;
    	$conversion->costo = $request->costo;
    	$conversion->desde = date('Y-m-d');
    	$conversion->save();
    	return $conversion;
    }

    public static function historial($tipo) {
    	return $historial = self::where('tipo',$tipo)->orderBy('created_at','desc')->get();
    }
}

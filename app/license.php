<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Promoters;
use App\module;

class license extends Model
{
    protected $table = 'license';
    protected $fillable = [
		'id',
		'user_id',
		'module_id'
    ];

    public function module()
    {
        return $this->hasMany('App\module','module_id');
    }

    public function Promoters()
    {
        return $this->hasMany('App\Promoters','promoter_id');
    }

    public static function whereUsuario($tipo) {
    	return Promoters::where('priority',$tipo)->get();
    }

    public static function newNegado($request) {
        $module = new license;
        $module->promoter_id = $request->user;
        $module->module_id = $request->modules;
        $module->save();
        return $module;
    }

}

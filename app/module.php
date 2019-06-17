<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    protected $table = 'module';
    protected $fillable = [
		'id',
		'name'
    ];

    public function license() {
        return $this->belongsToMany('App\module','license','promoter_id','module_id');
    }

    public static function newModul($request) {
        $module = new module;
        $module->name = $request->name;
        $module->save();
        return $module;
    }

    // public static function statusModule($id,$status) {
    // 	$module = self::find($id);
    // 	$module->status = $status;
    // 	$module->save();
    // 	return $module;
    // }

}

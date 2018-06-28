<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotersRoles extends Model
{
    protected $table = 'promoter_modules';

    protected $fillable = ['name','id','priority'];


    public function roles()
    {
        return $this->belongsToMany('App\Promoters','promoter_acces','promoter_module_id','promoter_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellersRoles extends Model
{
    //Nombre de la tabla donde estan guardados los diferentes modulos del sistema
    protected $table = 'sellers_modules';

    protected $fillable = ['name','id'];


    public function roles()
    {
        return $this->belongsToMany('App\Seller','seller_acces','modules_id','sellers_id');
    }
}

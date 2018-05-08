<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;


class Promoters extends Authenticatable
{
    protected $table = 'promoter';

   protected $fillable = [
      'id',
      'name_c', 
      'contact_s',
      'phone_s',
      'email',
      'created_at',
      'updated_at',
      'password',
    ];

    public function Applys()
    {
        return $this->hasMany('App\ApplysSellers','promoter_id');
    
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplysSellers extends Model
{
    //
   protected $table = 'applys_sellers';

   protected $fillable = [
      'id',
      'salesman_id',
      'name_c', 
      'contact_s',
      'phone_s',
      'email',
      'status',
      'dsc',
      'desired_m',
      'sub_desired_m',
      'assing_at',
      'promoter_id',
      'created_at',
      'updated_at',
      'token',
      'expires_at'
    ];

    public function Salesman()
    {
        return $this->belongsTo('App\Salesman','salesman_id');
    }

}

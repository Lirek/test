<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller_closed extends Model
{
    //Mass assignable attributes
    protected $fillable = [
      'id',
      'name',
      'email', 
      'password',
      'estatus',
      'promoter_id',
      'ruc_s',
      'descs_s',
      'adj_ruc',
      'tlf',
      'account_status',
      'logo',
      'address',
      'created_at',
      'updated_at',
      'credito',
      'credito_pendiente',
    ];

    //hidden attributes
    protected $hidden = [
       'password', 'remember_token',
    ];
}

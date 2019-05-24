<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginControl extends Model
{
    //
    protected $table = 'login_control';

    protected $fillable = [
      'id',
      'ip_log',
      'id_login', 
      'created_at',
      'updated_at',
    ];
}

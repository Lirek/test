<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_closed extends Model {


protected $fillable = [
        'name', 
        'last_name',
        'email', 
        'password',
        'codigo_ref',
        'type_doc',
        'num_doc',
        'img_doc',
        'type',
        'alias',
        'img_perf',
        'direccion',
        'credito',
        'phone',
        'account_status',
        'fech_nac',
        'status',
        'id',
        'verify',
        'points',
        'pending_points',
        'limit_points',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    


    //
}

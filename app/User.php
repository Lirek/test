<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','email', 'password',
        'codigo_ref', 'type_doc', 'num_doc',
        'img_doc', 'genero', 'alias', 'img_perf',
        'credito', 'fech_nac','status','id','verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function Referals()
    {
    return $this->hasMany('App\Referals', 'user_id');
    }
}

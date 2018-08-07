<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
        'img_doc', 'type', 'alias', 'img_perf',
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
    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    
      public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    
    public function getJWTCustomClaims()
    {
        return [];
    }

     public function Referals()
    {
    return $this->hasMany('App\Referals', 'user_id');
    }
    
    public function UserRefered(){
        return $this->hasMany('App\Referals', 'refered');
    }

    public function Follows()
    {
    return $this->hasMany('App\Followers', 'user_id');
    }
}

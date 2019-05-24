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
        'email_verification'
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

    public function Payments()
    {
        return $this->hasMany('App\Payments', 'user_id');
    }

    public function Assings()
    {
        return $this->hasMany('App\PointsAssings', 'from');
    }

    public function ticketsUser() {
        return $this->hasMany('App\Payments', 'user_id');
    }
    public function pointLoser() {
        return $this->hasMany('App\PointsLoser', 'user_id');
    }


    public static function songs_add($user){

        $TranSingle= Transactions::select('song_id')->where('user_id','=',$user->id)->where('song_id','<>',0)->get();
        $songs_add=array();
        foreach ($TranSingle as $Ts) {
           $songs_add[]=$Ts->song_id;
        }
        return $songs_add;

    }

    //retorna un array con los contenidos adquiridos por usuario.
     public static function contenidos_add($user, $id_contenido){

        $Transactions= Transactions::select($id_contenido)->where('user_id','=',$user->id)->where($id_contenido,'<>',0)->get();
        $contenidos_add=array();
        foreach ($Transactions as $Ts) {
           $contenidos_add[]=$Ts->$id_contenido;
        }
        return $contenidos_add;

    }

    public static function episode_add($user){

        $TranEpisode= Transactions::select('episodes_id')->where('user_id','=',$user->id)->where('episodes_id','<>',0)->get();
        $episode_add=array();
        // dd(count($TranEpisode));
        if(count($TranEpisode)>0)
        {
            foreach ($TranEpisode->sortBy('episodes_id') as $Ts) {
               $episode_add[]=$Ts->episodes_id;
            }
        }
        else
        {
            $episode_add[]=null;
        }
        return $episode_add;

    }


}

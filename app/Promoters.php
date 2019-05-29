<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

//Notification for Seller
use App\Notifications\PromoterResetPasswordNotification;




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

    public function license() {
        return $this->belongsToMany('App\module','license','promoter_id','module_id');
    }

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PromoterResetPasswordNotification($token));
    }

    public function Sales()
    {
        return $this->hasMany('App\Salesman','promoter_id');
    
    }

    public function Roles()
    {
        return $this->belongsToMany('App\PromotersRoles','promoter_acces','promoter_id','promoter_module_id');
    
    }

    public function Logins()
    {
      return $this->hasMany('App\LoginControl','id_login');
    }
}

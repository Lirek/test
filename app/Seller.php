<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Class which implements Illuminate\Contracts\Auth\Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;

//Notification for Seller
use App\Notifications\SellerResetPasswordNotification;

//Trait for sending notifications in laravel
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    // This trait has notify() method defined
    use Notifiable;

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
      'logo',
      'created_at',
      'updated_at',
    ];

    //hidden attributes
    protected $hidden = [
       'password', 'remember_token',
    ];

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SellerResetPasswordNotification($token));
    }

       /**
     * The roles that belong to the Seller.
     */
    public function roles()
    {
        return $this->belongsToMany('App\SellersRoles','seller_acces','sellers_id','modules_id');
    }

    public function Promoter()
    {
      return $this->belongsTo('App\Promoters','promoter_id');
    }

    public function MusicAuthors()
    {
      return $this->hasMany('App\music_authors','seller_id'); 
    }

    public function songs()
    {
        return $this->hasMany('App\Songs','seller_id');
    }
    
    public function albums()
    {
        return $this->hasMany('App\Albums','seller_id');
    }
    
    public function sagas()
    {
        return $this->hasMany('App\Sagas', 'seller_id');
    }
    
    public function Megazines()
    {
        return $this->hasMany('App\Megazines', 'seller_id');
    }

    public function Books()
    {
        return $this->hasMany('App\Book', 'seller_id');
    }

    public function BooksAuthors()
    {
     return $this->hasMany('App\BookAuthor', 'seller_id'); 
    }

    public function Tags()
    {
     return $this->hasMany('App\Tags', 'seller_id'); 
    }

    public function Radio()
    {
        return $this->hasMany('App\Radio', 'seller_id');
    }

    public function Tv()
    {
        return $this->hasMany('App\Tv', 'seller_id');
    }

    public function movies()
    {
        return $this->hasMany('App\Movie', 'seller_id');
    }
    public function series()
    {
        return $this->hasMany('App\Serie', 'seller_id');
    }

//https://prueba.leipel.com.automatis.com.ec
    public function followers()
    {
        return $this->hasMany('App\Followers', 'seller_id');
    }
    
}

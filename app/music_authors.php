<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class music_authors extends Model
{
    
    //Nombre de la tabla 

    protected $table = 'music_authors';

    protected $fillable = [
      'name',
      'id',
      'type_authors', 
      'descripcion',
      'country', 
      'photo',
      'instagram',
      'facebook', 
      'twitter', 
      'google',
      'seller_id',
    ];

     public function songs()
    {
        return $this->hasMany('App\Songs','autors_id');
    }

    public function albums()
    {
        return $this->hasMany('App\Albums','autors_id');
    }


    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }
}

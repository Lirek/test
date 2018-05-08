<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sagas extends Model
{
    //
    protected $table = 'saga';

   protected $fillable = [
             'id',
             'sag_name',
             'sag_description',
             'status',
             'type_saga',
             'img_saga',
             'seller_id',
             'rating_id',
    ];

    public function tags_sagas()
    {
        return $this->belongsToMany('App\Tags','saga_tags','saga_id','tags_id');
    }

     public function megazines()
    {
        return $this->hasMany('App\Megazines','saga_id');
    }

    public function book()
    {
        return $this->hasOne('App\Book');
    }

    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function Rating()
    {
    return $this->belongsTo('App\Rating', 'rating_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Megazines extends Model
{
    //

    protected $table = 'megazines';

   protected $fillable = [
      'id',
      'seller_id',
      'title', 
      'cover',
      'num_pages',
      'descripcion',
      'megazine_file',
      'saga_id',
      'cost',
      'status',
      'country',
      'rating_id',
      'created_at',
      'updated_at',
    ];

    public function sagas()
    {
    return $this->belongsTo('App\Sagas', 'saga_id');
    }
    
    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }
    
    public function tags_megazines()
    {
        return $this->belongsToMany('App\Tags','megazine_tags','megazine_id','tags_id');
    }

    public function Rating()
    {
    return $this->belongsTo('App\Rating', 'rating_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    //
   protected $table = 'songs';

   protected $fillable = [
      'id',
      'autors_id', 
      'seller_id',
      'album',
      'song_file',
      'song_name',
      'cost',
      'publish_date',
      'duration',
      'status',
    ];

    public function album()
    {
        return $this->belongsTo('App\Albums','album');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags','songs_tags','songs_id','tags_id');
    }

    public function autors()
    {
    return $this->belongsTo('App\music_authors', 'autors_id');
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

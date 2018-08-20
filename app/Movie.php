<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'id', 'seller_id','title',
        'original_title', 'img_poster',
        'story', 'country', 'based_on',
        'duration','after', 'before',
        'saga_id', 'release_year',
        'rating_id', 'cost','status',
        'trailer_url'
    ];

    public function saga()
    {
        return $this->belongsTo('App\Sagas');
    }

    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }

    public function Seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }
    public function tags_movie() {
      return $this->belongsToMany('App\Tags','movies_tags','movies_id','tags_id');
    }
}

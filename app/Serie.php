<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'id',
        'seller_id',
        'saga_id',
        'cost',
        'trailer',
        'status',
        'status_series',
        'title',
        'img_poster',
        'release_year',
        'before',
        'after'
    ];

    public function Episode() {
      return $this->hasMany('App\Episode','series_id');
    }

    public function Seller() {
      return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function Saga() {
        return $this->belongsTo('App\Sagas', 'saga_id');
    }

    public function Rating() {
      return $this->belongsTo('App\Rating', 'rating_id');
    }

    public function Transactions() {
      return $this->hasMany('App\Transactions','series_id'); 
    }

    public function tags_serie() {
      return $this->belongsToMany('App\Tags','series_tags','series_id','tags_id');
    }

}

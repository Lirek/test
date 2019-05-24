<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';

    protected $fillable = [
        'id',
        'seller_id',
        'series_id',
        'cost',
        'sinopsis',
        'episode_file',
        'status',
        'trailer_url',
        'episode_name'
    ];


    public function Serie() {
        return $this->belongsTo('App\Serie','series_id');
    }

    public function Seller() {
        return $this->belongsTo('App\Seller', 'seller_id');
    }
    public function transaction()
    {
        return $this->hasMany('App\Transactions','episodes_id');
    }
}

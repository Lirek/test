<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';

    protected $fillable = [
        'seller_id',
        'series_id',
        'cost',
        'sipnopsis',
        'episode_file',
        'status',
        'id'
    ];
}

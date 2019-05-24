<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series_tag extends Model
{
    protected $table = 'series_tags';

    protected $fillable= [
        'series_id',
        'tags_id'
    ];
}

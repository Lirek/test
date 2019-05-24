<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviesTags extends Model
{
    protected $table = 'movies_tags';

    protected $fillable= [
        'movies_id',
        'tags_id'
    ];
}

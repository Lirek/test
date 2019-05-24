<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MegazineTags extends Model
{
    protected $table = 'megazine_tags';

    protected $fillable= [
        'megazine_id',
        'tags_id'
    ];
}

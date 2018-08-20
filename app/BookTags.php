<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTags extends Model
{
    protected $table = 'books_tags';

    protected $fillable= [
        'books_id',
        'tags_id'
    ];
}

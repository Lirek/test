<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use Notifiable;

    protected $fillable = [
        'seller_id', 'author_id', 'title', 'id',
        'original_title', 'cover', 'sinopsis',
        'books_file', 'country', 'after', 'before',
        'saga_id', 'release_year', 'cost', 'status'
    ];

    public function author()
    {
        return $this->belongsTo('App\BookAuthor');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

    public function saga()
    {
        return $this->belongsTo('App\Saga');
    }

}

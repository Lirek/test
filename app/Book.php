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
        'saga_id', 'release_year', 'cost', 'status',
        'rating_id'
    ];

    public function author()
    {
        return $this->belongsTo('App\BookAuthor', 'author_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller', 'seller_id');
    }

    public function saga()
    {
        return $this->belongsTo('App\Sagas');
    }

    public function rating()
    {
        return $this->belongsTo('App\Rating');
    }
    public function tags_book() {
      return $this->belongsToMany('App\Tags','books_tags','books_id','tags_id');
    }

}

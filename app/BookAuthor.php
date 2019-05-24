<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BookAuthor extends Model
{
    use Notifiable;

    protected  $table = 'books_authors';

    protected $fillable = [
        'seller_id', 'full_name', 'photo',
        'email_c', 'google', 'instagram',
        'facebook', 'twitter', 'id', 'status'
    ];

    public function books()
    {
        return $this->hasMany('App\Book','author_id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

}

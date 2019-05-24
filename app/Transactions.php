<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'books_id', 
        'album_id',
        'song_id', 
        'series_id', 
        'episodes_id',
        'movies_id', 
        'megazines_id', 
        'tickets',
        'seller_id'
    ];

    public function Books()
    {
    return $this->belongsTo('App\Book', 'books_id');
    }

    public function Albums()
    {
    return $this->belongsTo('App\Albums', 'album_id');
    }

    public function Songs()
    {
    return $this->belongsTo('App\Songs', 'song_id');
    }

    public function Series()
    {
    return $this->belongsTo('App\Serie', 'series_id');
    }

    public function Episodes()
    {
    return $this->belongsTo('App\Episode', 'episodes_id');
    }

    public function Movies()
    {
    return $this->belongsTo('App\Movie', 'movies_id');
    }

    public function Megazines()
    {
    return $this->belongsTo('App\Megazines', 'megazines_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksTrace extends Model
{
    protected $table = 'books_trace';

     protected $fillable = [
       'id',
       'books_id',
       'user_id',
       'created_at'
     ];

    public function Books()
    {
    return $this->belongsTo('App\Book', 'books_id');
    }

    public function User()
    {
    return $this->belongsTo('App\User', 'user_id');
    }
}

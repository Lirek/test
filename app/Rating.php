<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    protected $fillable = [
        'id',
        'r_name',
        'r_descr',
    ];

    public function sagas()
    {
        return $this->hasMany('App\Sagas','id');
    }

    public function movies()
    {
        return $this->hasMany('App\Movie', 'rating_id');
    }

    public function books()
    {
        return $this->hasMany('App\Book','rating_id');
    }
}

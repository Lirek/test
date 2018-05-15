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

}

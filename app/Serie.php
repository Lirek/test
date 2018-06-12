<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    protected $fillable = [
        'seller_id',
        'saga_id',
        'cost',
        'trailer',
        'status',
        'status_series',
        'id'
    ];

}

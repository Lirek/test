<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    protected $table = 'rejection';

    protected $fillable = [
        'id',
        'module',
        'id_module',
        'reason'
    ];
}

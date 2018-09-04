<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsPackage extends Model
{
    protected $table = 'tickets_package';

         protected $fillable = [
        'id', 
        'amount',
        'photo',
        'name',
        'points',
        'cost',
        'promoter_id',
        'points_cost'
        ];
}

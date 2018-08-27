<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'tickets_sales';

         protected $fillable = [
        'user_id', 
        'package_id',
        'voucher',
        'cost',
        'value',
        'status',
        'references', 
        ];

        public function Tickets()
        {
        	return $this->belongsTo('App\TicketsPackage', 'package_id');
        }

        public function TicketsUser()
        {
        	return $this->belongsTo('App\User', 'user_id');
        }
}

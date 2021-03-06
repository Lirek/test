<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'tickets_sales';

         protected $fillable = [
        'id',
        'user_id', 
        'package_id',
        'voucher',
        'cost',
        'value',
        'status',
        'references',
        'factura_id',
        'method',
        'created_at'
        ];

        public function Tickets()
        {
        	return $this->belongsTo('App\TicketsPackage', 'package_id');
        }

        public function ticketsUser() {
        	return $this->belongsTo('App\User', 'user_id');
        }
}

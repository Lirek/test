<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentSeller extends Model
{
    protected $table = 'payments';

    protected $fillable = [
    	'id',
    	'seller_id',
    	'factura',
    	'tickets',
    	'fecha_cita',
    	'status'
    ];

    public function TicketsSeller() {
    	return $this->belongsTo('App\Seller', 'seller_id');
    }
    
    public function Seller() {
        return $this->belongsTo('App\Seller', 'seller_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exchange_product extends Model
{
    protected $table = 'exchange_product';
    protected $fillable = [
		'id',
		'product_id',
		'user',
		'amount',
		'cost',
		'status',
    ];

    public function Producto() {
        return $this->belongsTo('App\Products','product_id');
    }

}

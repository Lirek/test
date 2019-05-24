<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProducto extends Model
{
    protected $table = 'sub_product';
    protected $fillable = [
		'id',
		'product_id',
		'cost'
	];

	public function Producto() {
        return $this->belongsTo('App\Producto','product_id');
    }
}

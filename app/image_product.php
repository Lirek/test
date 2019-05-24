<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;

class image_product extends Model
{
    protected $table = 'image_product';
    protected $fillable = [
		'id',
		'product_id',
		'imagen_prod'
    ];

    	public function Producto() {
        return $this->belongsTo('App\Products','product_id');
    }

}

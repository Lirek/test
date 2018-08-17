<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
     
   protected $table = 'account_balance';

   protected $fillable = [
       'id',
       'seller_id',
       'balance',

    ];

   public function Seller() {
      return $this->belongsTo('App\Seller', 'seller_id');
    }
}

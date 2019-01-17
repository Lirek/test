<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Radio extends Model
{
    use Notifiable;

    protected $fillable = [
        'id',
        'seller_id',
        'name_r', 
        'streaming',
        'logo', 
        'email_c',
        'web',
        'google',
        'instagram', 
        'facebook', 
        'twitter'
    ];

    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }
}

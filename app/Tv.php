<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Tv extends Model
{
    use Notifiable;
    protected $table = 'tv';

    protected $fillable = [
        'id',
        'seller_id', 'name_r', 'streaming',
        'logo', 'email_c', 'web', 'google',
        'instagram', 'facebook', 'twitter'
    ];

    public function Seller()
    {
    return $this->belongsTo('App\Seller', 'seller_id');
    }
}

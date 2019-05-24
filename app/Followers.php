<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    protected $table = 'suscription';

    protected $fillable = ['seller_id',
    					   'user_id',
    					   'id'
						  ];
}

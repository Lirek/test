<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalPayments extends Model
{
    protected $table = 'external_points_payments';

    protected $fillable= [
							'id',
							'client_id',
							'ammount',
							'user_id',
              'token_s',
							'status'
    					 ];

    public function User()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function Client()
    {
    return $this->belongsTo('App\ExternalClients', 'client_id');
    }
}

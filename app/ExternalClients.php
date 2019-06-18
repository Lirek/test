<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalClients extends Model
{
    protected $table = 'external_client';

    protected $fillable= [
							'id',
							'url_host',
							'petition_url',
							'callback_url',
							'client_token',
							'client_secret_id',
              'bidder_id'
    					 ];
}

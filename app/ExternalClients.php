<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalClients extends Model
{
    protected $table = 'external_client';

    protected $fillable= [
							'id',
							'client_name',
							'url_host',
							'petition_url',
							'admin_email',
							'callback_url',
							'client_token',
							'client_secret_id'
    					 ];
}

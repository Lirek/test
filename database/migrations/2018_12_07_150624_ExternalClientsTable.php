<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExternalClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_client', function (Blueprint $table) 
        {
    
            $table->increments('id');
            $table->string('client_name')->nullable()->default(NULL);
            $table->string('url_host')->nullable()->default(NULL);
            $table->string('petition_url')->nullable()->default(NULL);
            $table->string('admin_email')->unique()->nullable()->default(NULL);
            $table->string('callback_url')->nullable()->default(NULL);
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_client');
    }
}

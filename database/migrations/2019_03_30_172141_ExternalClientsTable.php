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
            $table->string('url_host')->nullable()->default(NULL);
            $table->string('petition_url')->nullable()->default(NULL);
            $table->string('callback_url')->nullable()->default(NULL);
            $table->string('client_token')->nullable()->default(NULL);
            $table->string('client_secret_id')->nullable()->default(NULL);
            $table->integer('bidder_id')->unsigned();
            $table->timestamps();
            $table->foreign('bidder_id')->references('id')->on('bidder');
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

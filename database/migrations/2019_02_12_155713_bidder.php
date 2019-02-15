<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bidder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidder', function (Blueprint $table){
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->string('password');
            $table->string('ruc');
            $table->string('imagen_ruc');
            $table->string('logo');
            $table->integer('points');
            $table->enum('status',['Aprobado','En Revision','Denegado']);
            $table->enum('account_status',['open','closed']);
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
        Schema::dropIfExists('bidder');
    }
}

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
            $table->string('password')->nullable();
            $table->string('ruc');
            $table->string('imagen_ruc')->nullable();
            $table->string('logo')->nullable();
            $table->integer('points')->nullable()->default(0);
            $table->enum('status',['En Revision','Pre-Aprobado','Aprobado','Denegado'])->default("En Revision");
            $table->string('token')->nullable();
            $table->enum('account_status',['open','closed'])->default("open");
            $table->rememberToken();
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

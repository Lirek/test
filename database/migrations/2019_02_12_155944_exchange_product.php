<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExchangeProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_product', function (Blueprint $table){
            $table->increments('id');
            $table->integer('product_id')->unsigned()->default('0');
            $table->integer('user_id')->unsigned()->default('0');
            $table->integer('amount');
            $table->integer('cost');
            $table->enum('status',['Aprobado','Entregado','Denegado']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_product');
    }
}

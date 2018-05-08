<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

    Schema::create('account_balance', function (Blueprint $table) 
    {
    $table->increments('id');
    $table->integer('seller_id')->unsigned();
    $table->integer('balance')->unsigned();
    $table->foreign('seller_id')->references('id')->on('sellers');
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
        //
    }
}

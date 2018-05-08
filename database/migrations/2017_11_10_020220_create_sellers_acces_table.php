<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersAccesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('seller_acces', function (Blueprint $table){
    
    $table->integer('sellers_id')->unsigned()->default(0);
    $table->integer('modules_id')->unsigned()->default(0);

    $table->foreign('sellers_id')->references('id')->on('sellers');
    $table->foreign('modules_id')->references('id')->on('sellers_modules');
    $table->primary(['sellers_id', 'modules_id']);
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

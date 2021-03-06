<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePointsAssing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_assing', function (Blueprint $table){
            $table->increments('id');
            $table->integer('amount')->unsigned()->default('1');
            $table->integer('from')->unsigned()->default('0');
            $table->integer('to')->unsigned()->default('0');
            $table->enum('status',['Activo','Negado']);
            $table->timestamps();
            $table->foreign('from')->references('id')->on('users');
            //$table->foreign('to')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points_assing');
    }
}

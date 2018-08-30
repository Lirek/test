<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TvTraceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_trace', function (Blueprint $table){

            $table->increments('id');
            $table->integer('tv_id')->unsigned()->default();
            $table->integer('user_id')->unsigned()->default();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('tv_id')->references('id')->on('tv');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('tv_trace');        
        
    }
}

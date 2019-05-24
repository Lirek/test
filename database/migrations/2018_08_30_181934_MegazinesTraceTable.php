<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MegazinesTraceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('megazine_trace', function (Blueprint $table){

            $table->increments('id');
            $table->integer('megazine_id')->unsigned()->default();
            $table->integer('user_id')->unsigned()->default();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('megazine_id')->references('id')->on('megazines');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('megazine_trace');        
    }
}

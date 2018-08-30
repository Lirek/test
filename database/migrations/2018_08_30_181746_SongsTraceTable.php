<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SongsTraceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_trace', function (Blueprint $table){

            $table->increments('id');
            $table->integer('songs_id')->unsigned()->default();
            $table->integer('user_id')->unsigned()->default();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('songs_id')->references('id')->on('songs');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('songs_trace');        
    }
}

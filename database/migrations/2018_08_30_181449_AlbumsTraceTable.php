<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlbumsTraceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums_trace', function (Blueprint $table){

            $table->increments('id');
            $table->integer('albums_id')->unsigned()->default();
            $table->integer('user_id')->unsigned()->default();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('albums_id')->references('id')->on('album');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('albums_trace');
        
    }
}

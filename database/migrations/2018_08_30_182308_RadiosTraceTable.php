<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RadiosTraceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radios_trace', function (Blueprint $table){

            $table->increments('id');
            $table->integer('radio_id')->unsigned()->default();
            $table->integer('user_id')->unsigned()->default();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('radio_id')->references('id')->on('radios');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('radios_trace');        
        
    }
}

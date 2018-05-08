<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSondMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('sound_movies', function (Blueprint $table){
    $table->increments('id');
    $table->string('full_name')->default(0);
    $table->integer('movies_id')->unsigned()->default(0);
    $table->foreign('movies_id')->references('id')->on('movies');



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

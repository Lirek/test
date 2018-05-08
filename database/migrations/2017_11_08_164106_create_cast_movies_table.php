<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCastMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

    Schema::create('cast_movies', function (Blueprint $table){
    $table->increments('id');
    $table->integer('movies_id')->unsigned()->default(0);
    $table->integer('actors_id')->unsigned()->default(0);
    $table->foreign('actors_id')->references('id')->on('actors');
    $table->foreign('movies_id')->references('id')->on('movies');
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

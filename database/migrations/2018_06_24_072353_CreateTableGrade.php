<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_grades', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default('0');
            $table->integer('books_id')->unsigned()->default('0');
            $table->integer('album_id')->unsigned()->default('0');
            $table->integer('song_id')->unsigned()->default('0');
            $table->integer('series_id')->unsigned()->default('0');
            $table->integer('episodes_id')->unsigned()->default('0');
            $table->integer('movies_id')->unsigned()->default('0');
            $table->integer('megazines_id')->unsigned()->default('0');
            $table->integer('grade')->default('0');
            $table->timestamps();

            $table->foreign('megazines_id')->references('id')->on('megazines');
            $table->foreign('movies_id')->references('id')->on('movies');
            $table->foreign('episodes_id')->references('id')->on('episodes');
            $table->foreign('series_id')->references('id')->on('series');
            $table->foreign('song_id')->references('id')->on('songs');
            $table->foreign('books_id')->references('id')->on('books');
            $table->foreign('user_id')->references('id')->on('users');
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

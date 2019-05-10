<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoviesTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('movies_tags', function (Blueprint $table){

            $table->integer('movies_id')->unsigned()->default();
            $table->integer('tags_id')->unsigned()->default();

            $table->foreign('tags_id')->references('id')->on('tags');
            $table->foreign('movies_id')->references('id')->on('movies');

            $table->primary(['movies_id', 'tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_tags');
    }
}

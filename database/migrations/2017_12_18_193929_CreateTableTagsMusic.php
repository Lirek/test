<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTagsMusic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('songs_tags', function (Blueprint $table){
    
    $table->integer('songs_id')->unsigned()->default();
    $table->integer('tags_id')->unsigned()->default();
    

    
    $table->foreign('tags_id')->references('id')->on('tags');
    $table->foreign('songs_id')->references('id')->on('songs');
    

    $table->primary(['songs_id', 'tags_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('songs_tags');
        
    }
}

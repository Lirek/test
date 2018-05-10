<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicMTMTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('music_tags', function (Blueprint $table){
    
    $table->integer('music_id')->unsigned()->default();
    $table->integer('tags_id')->unsigned()->default();
    

    
    $table->foreign('tags_id')->references('id')->on('tags');
    $table->foreign('music_id')->references('id')->on('album');
    

    $table->primary(['music_id', 'tags_id']);

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

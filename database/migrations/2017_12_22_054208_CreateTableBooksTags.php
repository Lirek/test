<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBooksTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('books_tags', function (Blueprint $table){
    
    $table->integer('books_id')->unsigned()->default();
    $table->integer('tags_id')->unsigned()->default();
    

    
    $table->foreign('tags_id')->references('id')->on('tags');
    $table->foreign('books_id')->references('id')->on('books');
    

    $table->primary(['books_id', 'tags_id']);
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

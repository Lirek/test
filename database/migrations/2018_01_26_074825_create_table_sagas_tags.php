<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSagasTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
     Schema::create('saga_tags', function (Blueprint $table){

     $table->integer('saga_id')->unsigned()->default();
     $table->integer('tags_id')->unsigned()->default();



     $table->foreign('tags_id')->references('id')->on('tags');
     $table->foreign('saga_id')->references('id')->on('songs');


     $table->primary(['saga_id', 'tags_id']);
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

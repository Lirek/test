<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCastSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('series_tags', function (Blueprint $table){
    
            $table->integer('series_id')->unsigned()->default(0);
            $table->integer('tags_id')->unsigned()->default(0);
            
        
            
            $table->foreign('tags_id')->references('id')->on('tags');
            $table->foreign('series_id')->references('id')->on('series');
            
        
            $table->primary(['series_id', 'tags_id']);
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

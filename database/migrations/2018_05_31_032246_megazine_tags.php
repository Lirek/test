<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MegazineTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('megazine_tags', function (Blueprint $table){
    
                $table->integer('megazine_id')->unsigned()->default();
                $table->integer('tags_id')->unsigned()->default();
    
                $table->foreign('tags_id')->references('id')->on('tags');
                $table->foreign('megazine_id')->references('id')->on('megazines');
                $table->primary(['megazine_id', 'tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('megazine_tags');
        
    }
}

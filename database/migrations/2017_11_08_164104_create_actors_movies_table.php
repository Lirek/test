<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('actors', function (Blueprint $table){
    $table->increments('id');
    $table->string('full_name')->nullable();
    $table->string('instagram')->nullable();
    $table->string('facebook')->nullable();
    $table->string('twitter')->nullable();
    $table->string('google')->nullable();
    $table->string('photo')->nullable();
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
        Schema::dropIfExists('actors');
        
    }
}

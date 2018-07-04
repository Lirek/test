<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('tags', function (Blueprint $table){
    $table->increments('id');
    $table->string('tags_name')->nullable();
    $table->enum('type_tags',['Peliculas','Musica','Libros','Radios','TV','Series','Revistas']);
    $table->enum('status',['Aprobado','En Proceso','Denegado'])->default('En Proceso');
    $table->integer('seller_id')->unsigned()->nullable()->default(NULL);    
    $table->foreign('seller_id')->references('id')->on('sellers');

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

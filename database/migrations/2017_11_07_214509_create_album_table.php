<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('album', function (Blueprint $table){
    $table->increments('id');
    $table->integer('seller_id')->unsigned();
    $table->integer('autors_id')->unsigned();
    $table->integer('rating_id')->unsigned();
    $table->string('name_alb')->nullable();
    $table->string('cover')->nullable();
    $table->string('producer')->nullable();
    $table->string('duration')->nullable()->default(NULL);        
    $table->integer('cost')->unsigned();
    $table->date('release_date')->nullable();
    $table->timestamps();
    $table->enum('status',['Aprobado','En Revision','Denegado'])->default('En Revision');
    $table->foreign('seller_id')->references('id')->on('sellers');
    $table->foreign('rating_id')->references('id')->on('rating');
    $table->foreign('autors_id')->references('id')->on('music_authors');

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

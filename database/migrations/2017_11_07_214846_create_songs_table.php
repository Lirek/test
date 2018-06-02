<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('songs', function (Blueprint $table){
    $table->increments('id');
    $table->integer('autors_id')->unsigned();
    $table->integer('seller_id')->unsigned()->default(1);
    $table->integer('rating_id')->unsigned()->default(Null);
    $table->integer('album')->unsigned()->default(Null);
    $table->string('song_file')->nullable();
    $table->string('song_name')->nullable();
    $table->string('duration')->nullable()->default(NULL);             
    $table->integer('cost')->nullable();
    $table->date('release_date')->nullable();
    $table->enum('status',['Aprobado','En Revision','Denegado'])->default('En Revision');    
    $table->timestamps();

    $table->foreign('rating_id')->references('id')->on('rating');

    $table->foreign('album')->references('id')->on('album');

    $table->foreign('seller_id')->references('id')->on('sellers');
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

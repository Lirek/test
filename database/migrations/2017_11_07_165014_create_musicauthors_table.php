<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicauthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('music_authors', function (Blueprint $table){
    $table->increments('id');
    $table->string('name')->nullable();
    $table->enum('type_authors',['Agrupacion Musical','Solista']);
    $table->longText('descripcion')->nullable()->default(NULL);
    $table->string('country')->nullable();
    $table->string('instagram')->nullable();
    $table->string('facebook')->nullable();
    $table->string('twitter')->nullable();
    $table->string('google')->nullable();
    $table->string('photo')->nullable();
    $table->integer('seller_id')->unsigned();
    $table->timestamps();
    $table->enum('status',['Aprobado','En Proceso','Denegado']);
    
    $table->foreign('seller_id')->references('id')->on('sellers');
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

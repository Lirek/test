<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('saga', function (Blueprint $table){
    $table->increments('id');
    $table->integer('seller_id')->unsigned()->default(0);
    $table->integer('rating_id')->unsigned()->default(0);
    $table->string('sag_name')->nullable();
    $table->longText('sag_description')->nullable()->default(NULL);
    $table->string('img_saga')->nullable()->default(NULL);
    $table->enum('status',['Aprobado','En Proceso','Denegado'])->default('En Proceso');
    $table->enum('type_saga',['Libros','Peliculas','Series','Revistas']);
    $table->foreign('seller_id')->references('id')->on('sellers');
    $table->foreign('rating_id')->references('id')->on('rating');
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
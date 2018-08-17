<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('tv', function (Blueprint $table) 
    {
    
    $table->increments('id');
    $table->integer('seller_id')->unsigned();
    $table->string('name_r')->nullable();
    $table->string('streaming')->nullable();
    $table->string('logo')->nullable();
    $table->string('email_c')->nullable();
    $table->string('google')->nullable();
    $table->string('instagram')->nullable();
    $table->string('facebook')->nullable();
    $table->string('twitter')->nullable();
    $table->enum('status',['Aprobado','En Proceso','Denegado'])->default('En Proceso');
    $table->timestamps();
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
       Schema::dropIfExists('tv');
        
    }
}

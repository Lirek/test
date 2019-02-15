<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table){
            $table->increments('id');
            $table->integer('bidder_id')->unsigned()->default('0');
            $table->string('imagen_prod');
            $table->string('pdf_prod');
            $table->string('name');
            $table->string('description');
            $table->integer('cost');
            $table->enum('status',['Aprobado','En Revision','Denegado']);
            $table->timestamps();
            $table->foreign('bidder_id')->references('id')->on('bidder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

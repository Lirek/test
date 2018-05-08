<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMegazines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('megazines', function (Blueprint $table){
    $table->increments('id');
    $table->integer('rating_id')->unsigned()->default('0');
    $table->integer('seller_id')->unsigned()->default('0');
    $table->integer('num_pages')->unsigned()->default('0');
    $table->string('title')->nullable()->default('0');
    $table->string('cover')->nullable()->default('0');
    $table->longText('descripcion')->nullable()->default(NULL);
    $table->string('megazine_file')->nullable()->default(0);
    $table->integer('saga_id')->nullable()->unsigned()->default(0);
    $table->integer('cost')->nullable()->unsigned()->default(0);
    $table->string('country')->nullable()->default(0);
    $table->timestamps();
    $table->enum('status',['Aprobado','En Revision','Denegado']);
    $table->foreign('seller_id')->references('id')->on('sellers');
    $table->foreign('rating_id')->references('id')->on('rating');
    $table->foreign('saga_id')->references('id')->on('saga');
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

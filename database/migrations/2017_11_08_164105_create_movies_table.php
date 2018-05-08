<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
    Schema::create('movies', function (Blueprint $table){
    $table->increments('id');
    $table->integer('seller_id')->unsigned()->default('0');
    $table->string('title')->nullable()->default('0');
    $table->string('original_title')->nullable()->default('0');
    $table->string('img_poster')->nullable()->default('0');
    $table->longText('story')->nullable()->default(NULL);
    $table->string('country')->nullable()->default(0);
    $table->string('based_on')->nullable()->default(0);
    $table->string('duration')->nullable()->default(0);
    $table->integer('after')->nullable()->unsigned()->default(0);
    $table->integer('before')->nullable()->unsigned()->default(0);
    $table->integer('saga_id')->nullable()->unsigned()->default(0);
    $table->integer('release_year')->nullable()->unsigned()->default(0);
    $table->integer('rating_id')->nullable()->unsigned()->default(0);
    $table->integer('cost')->nullable()->unsigned()->default(0);
    $table->timestamps();
    $table->enum('status',['Aprobado','En Proceso','Denegado']);
    $table->string('trailer_url')->nullable();
    $table->foreign('seller_id')->references('id')->on('sellers');
    $table->foreign('saga_id')->references('id')->on('saga');
    $table->foreign('rating_id')->references('id')->on('rating');



   
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

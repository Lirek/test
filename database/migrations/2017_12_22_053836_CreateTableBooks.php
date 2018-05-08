<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
    Schema::create('books', function (Blueprint $table){
    $table->increments('id');
    $table->integer('seller_id')->unsigned()->default('0');
    $table->integer('author_id')->unsigned()->default('0');
    $table->string('title')->nullable()->default('0');
    $table->string('original_title')->nullable()->default('0');
    $table->integer('rating_id')->unsigned();
    $table->string('cover')->nullable()->default('0');
    $table->longText('sinopsis')->nullable()->default(NULL);
    $table->string('books_file')->nullable()->default(0);
    $table->string('country')->nullable()->default(0);
    $table->integer('after')->nullable()->unsigned()->default(0);
    $table->integer('before')->nullable()->unsigned()->default(0);
    $table->integer('saga_id')->nullable()->unsigned()->default(0);
    $table->integer('release_year')->nullable()->unsigned()->default(0);
    $table->integer('cost')->nullable()->unsigned()->default(0);
    $table->timestamps();
    $table->enum('status',['Aprobado','En Revision','Denegado']);
    $table->foreign('seller_id')->references('id')->on('sellers');
    $table->foreign('saga_id')->references('id')->on('saga');
    $table->foreign('rating_id')->references('id')->on('rating');
    $table->foreign('author_id')->references('id')->on('books_authors');
    
   
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

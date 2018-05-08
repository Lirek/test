<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBooksAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    Schema::create('books_authors', function (Blueprint $table) 
    {
    
    $table->increments('id');
    $table->integer('seller_id')->unsigned();
    $table->string('full_name')->nullable();
    $table->string('photo')->nullable();
    $table->string('email_c')->nullable();
    $table->string('google')->nullable();
    $table->string('instagram')->nullable();
    $table->string('facebook')->nullable();
    $table->string('twitter')->nullable();
    $table->enum('status',['Aprobado','En Revision','Denegado'])->default('En Revision');
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
        //
    }
}

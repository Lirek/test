<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

    Schema::create('promoter', function (Blueprint $table) 
    {
    
    $table->increments('id');
    $table->string('name_c')->nullable()->default(NULL);
    $table->string('contact_s')->nullable()->default(NULL);
    $table->string('phone_s')->nullable()->default(NULL);
    $table->string('email')->unique()->nullable()->default(NULL);
    $table->string('password')->nullable()->default(NULL);
    $table->integer('priority')->nullable()->default(NULL);
    $table->rememberToken();
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

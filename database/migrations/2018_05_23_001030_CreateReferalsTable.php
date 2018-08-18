<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('referals', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default('0');
            $table->integer('refered')->unsigned()->default('0');
            $table->string('my_code')->default('0');
            $table->timestamps();
            $table->foreign('refered')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('referals');
        
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class License extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license', function (Blueprint $table){
            $table->increments('id');
            $table->integer('promoter_id')->unsigned()->default('0');
            $table->integer('module_id')->unsigned()->default('0');
            $table->timestamps();
            $table->foreign('promoter_id')->references('id')->on('promoter');
            $table->foreign('module_id')->references('id')->on('module');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license');
    }
}

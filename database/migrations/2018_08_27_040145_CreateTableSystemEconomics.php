<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSystemEconomics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('system_balance', function (Blueprint $table){
            $table->increments('id');
            $table->integer('tickets_solds')->unsigned()->default('0');
            $table->integer('points_solds')->unsigned()->default('0');
            $table->integer('my_points')->unsigned()->default('0');
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
         Schema::dropIfExists('system_balance');
    }
}

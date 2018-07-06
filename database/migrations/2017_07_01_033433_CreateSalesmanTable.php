<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesman', function (Blueprint $table) 
            {
            
            $table->increments('id');
            $table->string('name')->nullable()->default(NULL);
            $table->string('adress')->nullable()->default(NULL);
            $table->string('phone')->nullable()->default(NULL);
            $table->string('email')->unique()->nullable()->default(NULL);
            $table->integer('promoter_id')->nullable()->default(NULL);
            $table->timestamps();
            
            $table->foreign('promoter_id')->references('id')->on('promoter');
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

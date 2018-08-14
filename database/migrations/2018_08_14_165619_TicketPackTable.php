<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketPackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tickets_package', function (Blueprint $table){
            $table->increments('id');
            $table->integer('amount')->unsigned()->default('0');
            $table->integer('cost')->unsigned()->default('0');            
            $table->string('photo')->nullable()->default(NULL);
            $table->string('name')->nullable()->default(NULL);
            $table->integer('promoter_id')->unsigned()->default('0');
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
       Schema::dropIfExists('tickets_package');
    }
}

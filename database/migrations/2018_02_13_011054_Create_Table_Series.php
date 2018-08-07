<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('series', function (Blueprint $table){
            $table->increments('id');
            $table->integer('seller_id')->unsigned()->default('0');
            $table->integer('saga_id')->nullable()->unsigned()->default(0);
            $table->text('title');
            $table->text('img_poster');
            $table->text('story');
            $table->integer('release_year');
            $table->integer('before');
            $table->integer('after');
            $table->integer('cost')->unsigned()->default('0');
            $table->string('trailer')->nullable()->default(NULL);
            $table->enum('status',['Aprobado','En Proceso','Denegado'])->default('En Proceso');
            $table->enum('status_series',['En Emision','Finalizado']);

            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers');
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

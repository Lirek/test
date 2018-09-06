<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo')->default('NULL');
            $table->string('tlf')->default('NULL');
            $table->enum('estatus',['Pre-Aprobado','Aprobado','Rechazado','En Proceso'])->default('En Proceso');
            $table->string('ruc_s')->default('NULL');
            $table->string('descs_s')->default('NULL');
            $table->string('adj_ruc')->default('NULL');
            $table->string('adj_ci')->default('NULL');
            $table->integer('promoter_id')->unsigned()->default(0);
            //$table->foreign('promoter_id')->references('id')->on('promoter');
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
        Schema::dropIfExists('sellers');
    }
}

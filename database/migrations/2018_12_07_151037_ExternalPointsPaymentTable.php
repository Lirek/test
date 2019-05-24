<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExternalPointsPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_points_payments', function (Blueprint $table) 
        {
            
            $table->increments('id');
            $table->integer('client_id')->nullable()->default(NULL);
            $table->integer('ammount')->nullable()->default(NULL);
            $table->string('user_id')->nullable()->default(NULL);
            $table->enum('status',['Aprobado','En Proceso','Denegado'])->default('En Proceso');
            $table->timestamps();
            /*
            con esto tiene error la migracion 
            $table->foreign('client_id')->references('id')->on('external_client');
            $table->foreign('user_id')->references('id')->on('user');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_points_payments');
    }
}

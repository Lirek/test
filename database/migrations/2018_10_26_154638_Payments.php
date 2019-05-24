<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table){
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->string('factura')->nullable()->default(NULL);
            $table->integer('tickets')->nullable()->default(NULL);
            $table->date('fecha_cita')->nullable()->default(NULL);
            $table->enum('status',['Disponible','Por cobrar','Diferido','Pagado','Rechazado'])->nullable()->default(NULL);
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

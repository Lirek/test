<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentsBidder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_bidder', function (Blueprint $table){
            $table->increments('id');
            $table->integer('bidder_id')->unsigned();
            $table->integer('points')->nullable()->default(NULL);
            $table->string('factura')->nullable()->default(NULL);
            $table->date('fecha_cita')->nullable()->default(NULL);
            $table->enum('status',['Por cobrar','Diferido','Pagado','Rechazado'])->nullable()->default(NULL);
            $table->timestamps();
            $table->foreign('bidder_id')->references('id')->on('bidder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments_bidder');
    }
}

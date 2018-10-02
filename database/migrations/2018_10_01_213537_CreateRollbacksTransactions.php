<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollbacksTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('transactions_rollbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_points_sales')->nullable();
            $table->integer('id_points_assing')->nullable();
            $table->integer('id_tickets_sales')->nullable();
            $table->integer('id_transaction')->nullable();
            $table->integer('ammount_points')->nullable();
            $table->integer('ammount_ticktes')->nullable();
            $table->foreign('id_points_sales')->references('id')->on('points_sales');
            $table->foreign('id_points_assing')->references('id')->on('points_assing');
            $table->foreign('id_tickets_sales')->references('id')->on('tickets_sales');
            $table->foreign('id_transaction')->references('id')->on('transactions');

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
        Schema::dropIfExists('transactions_rollbacks');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketsSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_sales', function (Blueprint $table){
            $table->increments('id');
            $table->integer('package_id')->unsigned()->default('0');
            $table->integer('cost')->unsigned()->default('0');            
            $table->integer('value')->nullable()->default('0');
            $table->string('voucher')->nullable()->default('0');
            $table->integer('user_id')->unsigned()->default('0');
            $table->timestamps();
            $table->enum('status',['Aprobado','En Revision','Denegado']);
            $table->string('reference')->nullable()->default('0');
            $table->string('factura_id')->nullable()->default(NULL);
            $table->string('method')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('package_id')->references('id')->on('tickets_package');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('tickets_sales'); 
    }
}

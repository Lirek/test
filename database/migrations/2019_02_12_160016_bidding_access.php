<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BiddingAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidding_access', function (Blueprint $table){
            $table->integer('bidding_id')->unsigned()->default(0);
            $table->integer('modules_id')->unsigned()->default(0);
            $table->foreign('bidding_id')->references('id')->on('bidder');
            $table->foreign('modules_id')->references('id')->on('bidding_modules');
            $table->primary(['bidding_id', 'modules_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidding_access');
    }
}

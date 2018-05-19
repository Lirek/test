<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SellerMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('seller_messages', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default('0');
            $table->string('message')->nullale()->default(Null);
            $table->enum('type_message',['Notificacion','Amonestacion','Informacion','Opinion'])->default('Informacion');
            $table->enum('status',['Leido','No Leido'])->default('No Leido');
            $table->integer('seller_id')->unsigned()->default('0');
            $table->timestamps();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('user_id')->references('id')->on('users');

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

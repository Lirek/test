<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('codigo_ref')->nullable();
            $table->string('ci')->nullable();
            $table->string('num_doc')->nullable();
            $table->string('img_doc')->nullable();
            $table->enum('type',['M','F','default'])->default('default');
            $table->enum('status',['admin','client'])->default('client');
            $table->string('alias')->nullable();
            $table->string('img_perf')->nullable();
            $table->integer('credito')->nullable();
            $table->date('fech_nac')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}

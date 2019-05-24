<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromoteAcces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
    Schema::create('promoter_acces', function (Blueprint $table){
    
    $table->integer('promoter_id')->unsigned()->default(0);
    $table->integer('promoter_module_id')->unsigned()->default(0);

    $table->foreign('promoter_id')->references('id')->on('promoter');
    $table->foreign('promoter_module_id')->references('id')->on('promoter_modules');
    $table->primary(['promoter_id', 'promoter_module_id']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('promoter_acces');
       
    }
}

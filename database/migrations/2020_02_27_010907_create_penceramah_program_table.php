<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenceramahProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penceramah_program', function (Blueprint $table) 
        {
            $table->increments('id_penceramah_program');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->unsignedInteger('id_penceramah')->nullable();
            $table->timestamps();
            $table->foreign('id_penceramah')->references('id_penceramah')-> on('penceramah')->onDelete('set null');
            $table->foreign('id_program')->references('id_program')-> on('program')->onDelete('cascade');
        });
    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penceramah_program');
    }
}

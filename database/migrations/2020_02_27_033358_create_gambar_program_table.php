<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambarProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_program', function (Blueprint $table) 
        {
            $table->increments('id_gambar_program');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->string('lokasi');
            $table->timestamps();
            $table->foreign('id_program')->references('id_program')->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_program');
    }
}

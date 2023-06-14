<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->increments('id_kehadiran');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');
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
        Schema::dropIfExists('kehadiran');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKumpulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumpulan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->boolean('status_pengesahan')->default(0);
            $table->unsignedBigInteger('id_program')->nullable();
            $table->foreign('id_program')->references('id_program')->on('program')->onDelete('set null');
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
        Schema::dropIfExists('kumpulan');
    }
}

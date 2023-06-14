<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianPenceramah extends Migration
{
    
    public function up()
    {
        Schema::create('penilaian_penceramah', function (Blueprint $table) {
            $table->increments('id_penilaian_penceramah');
            $table->unsignedInteger('id_penceramah')->nullable();
            $table->unsignedBigInteger('id_program')->nullable();
            $table->unsignedBigInteger('id_peserta')->nullable();
            $table->string('soalan1')->comment('pengetahuan tentang subjek');
            $table->string('soalan2')->comment('penjelasan fakta-fakta dan contoh');
            $table->string('soalan3')->comment('gaya/persembahan');
            $table->timestamps();
            $table->foreign('id_penceramah')->references('id_penceramah')->on('penceramah')->onDelete('set null');
            $table->foreign('id_program')->references('id_program')->on('program')->onDelete('cascade');
            $table->foreign('id_peserta')->references('id_pengguna')->on('pengguna')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_penceramah');
    }
}

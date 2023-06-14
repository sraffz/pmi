<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKajiSelidikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaji_selidik', function (Blueprint $table) {
            $table->increments('id_kaji_selidik');
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->string('peringkat');
            $table->string('gred_jawatan');
            $table->unsignedBigInteger('program')->nullable();
            $table->integer('penilaian_keseluruhan');
            $table->integer('penilaian_kemudahan');
            $table->integer('penilaian_bahan');
            $table->string('penambahbaikan');
            $table->string('cadangan');
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreign('program')->references('id_program')->on('program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaji_selidik');
    }
}

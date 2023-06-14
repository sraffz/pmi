<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->bigIncrements('id_program'); 
            $table->uuid('qrcode_kehadiran')->unique();
            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->string('nama_program');
            $table->string('anjuran');
            $table->text('deskripsi_program');
            $table->string('jenis_program');
            $table->date('tarikh_mula');
            $table->date('tarikh_akhir');
            $table->unsignedInteger('tempat')->nullable();
            $table->string('masa');
            $table->string('golongan_sasar');
            $table->string('yuran');
            $table->integer('kuota_peserta')->default(0);
            $table->integer('jumlah_peserta')->default(0);
            $table->unsignedBigInteger('pengurus_program')->nullable();
            $table->text('objektif');
            $table->text('impak');
            $table->text('maklumat_tambahan')->nullable();
            $table->string('poster_program');
            $table->string('kumpulan_limit')->nullable();
            $table->date('kumpulan_tarikh_akhir')->nullable();
            $table->boolean('status_aktif')->default(false)->comment('0 = Tidak Aktif, 1 = Aktif');
            $table->boolean('status_penyertaan')->default(false)->comment('0 = Penyertaan Dibuka, 1 = Penyertaan Ditutup');
            $table->boolean('status_kehadiran')->default(false)->comment('0 = Kehadiran Dibuka, 1 = Kehadiran Ditutup');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pendaftar')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreign('pengurus_program')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreign('tempat')->references('id')->on('tempat_program')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}

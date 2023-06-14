<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_program', function (Blueprint $table) 
        
        {
            $table->increments('id_daftar_program');
            $table->uuid('url_sijil')->nullable()->unique();
            $table->date('tarikh_daftar');
            $table->date('tarikh_batal')->nullable();
            $table->unsignedBigInteger('id_pengguna')->nullable();
            $table->unsignedBigInteger('id_program')->nullable();
            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->boolean('status_pengesahan')->nullable()->comment('null = Belum Disahkan, 0 = Tidak Berjaya, 1 = Berjaya');
            $table->boolean('status_kajiselidik')->default(false)->comment('0 = Belum Selesai, 1 = Selesai');
            $table->boolean('status_kehadiran')->default(false)->comment('0 = Tidak Hadir, 1 = Hadir, 2 = Hadir Sebahagian');
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            $table->foreign('id_program')->references('id_program')->on('program')->onDelete('cascade');
            $table->foreign('id_pendaftar')->references('id_pengguna')->on('pengguna')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_program');
    }
}

<?php

use Carbon\Carbon;
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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('id_pengguna');
            $table->unsignedBigInteger('id_pendaftar')->nullable();
            $table->string('nama_penuh');
            $table->string('nama_singkatan');
            $table->string('no_kad_pengenalan')->unique();
            $table->string('email')->unique();
            $table->string('no_telefon');
            $table->unsignedInteger('kategori')->nullable()->comment('0 = Kerajaan, 1= Swasta, 3 = Lain lain');
            $table->string('katalaluan');
            $table->string('alamat');
            $table->boolean('status_perakui_sah')->default(false)->comment('0 = tidak : 1 = ya');
            $table->boolean('status_aktif')->default(true)->comment('1 = akaun masih aktif : 0 = akaun tidak aktif');
            $table->boolean('status_katalaluan')->default(true)->comment('0 = belum kemaskini katalaluan : 1 = telah kemaskini katalaluan');
            $table->dateTime('akhir_logmasuk')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_pendaftar')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreign('kategori')->references('id_kategori_pengguna')->on('kategori_pengguna')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}

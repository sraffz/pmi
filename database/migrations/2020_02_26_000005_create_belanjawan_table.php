<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBelanjawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanjawan', function (Blueprint $table) {
            $table->increments('id_belanjawan');
            $table->unsignedBigInteger('id_pentadbir')->nullable();
            $table->unsignedBigInteger('id_program')->nullable();
            $table->double('bayaran_makanan')->default(0);
            $table->string('butiran_makanan')->nullable();
            $table->double('bayaran_cenderahati')->default(0);
            $table->string('butiran_cenderahati')->nullable();
            $table->double('bayaran_penceramah')->default(0);
            $table->string('butiran_penceramah')->nullable();
            $table->double('bayaran_fasilitator')->default(0);
            $table->string('butiran_fasilitator')->nullable();
            $table->double('bayaran_penginapan')->default(0);
            $table->string('butiran_penginapan')->nullable();
            $table->double('bayaran_tempat')->default(0);
            $table->string('butiran_tempat')->nullable();
            $table->double('bayaran_tiket')->default(0);
            $table->string('butiran_tiket')->nullable();
            $table->double('bayaran_sijil')->default(0);
            $table->string('butiran_sijil')->nullable();
            $table->double('bayaran_tiraiBelakang')->default(0);
            $table->string('butiran_tiraiBelakang')->nullable();
            $table->double('bayaran_lain')->default(0);
            $table->string('butiran_lain')->nullable();
            $table->double('jumlah')->default(0);
            $table->timestamps();
            $table->foreign('id_pentadbir')->references('id_pengguna')->on('pengguna')->onDelete('set null');
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
        Schema::dropIfExists('belanjawan');
    }
}

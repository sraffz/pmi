<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanLupaKatalaluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_lupa_katalaluan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kad_pengenalan');
            $table->string('no_telefon');
            $table->string('token');
            $table->string('ip');
            $table->string('channel')->default('sms');
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
        Schema::dropIfExists('permintaan_lupa_katalaluan');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenceramahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penceramah', function (Blueprint $table) {
            $table->increments('id_penceramah');
            $table->string('nama_penceramah');
            $table->string('no_kad_pengenalan');
            $table->string('no_telefon');
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('poskod')->nullable();
            $table->string('bandar')->nullable();
            $table->string('negeri')->nullable();
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
        Schema::dropIfExists('penceramah');
    }
}

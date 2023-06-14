<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFailProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fail_program', function (Blueprint $table) {
            $table->increments('id_fail');
            $table->unsignedBigInteger('id_program')->nullable();
            $table->string('nama_fail');
            $table->string('jenis_fail');
            $table ->string('lokasi');
            $table->timestamps();
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
        Schema::dropIfExists('fail_program');
    }
        }

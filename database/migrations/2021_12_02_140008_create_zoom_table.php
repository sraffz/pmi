<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->string('meeting_code')->nullable();
            $table->string('pass_code')->nullable();
            $table->unsignedBigInteger('id_program')->nullable();
            $table->foreign('id_program')->references('id_program')->on('program')->onDelete('cascade');
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
        Schema::dropIfExists('zoom');
    }
}

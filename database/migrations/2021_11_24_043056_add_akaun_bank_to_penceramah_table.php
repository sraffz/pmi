<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAkaunBankToPenceramahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penceramah', function (Blueprint $table) {
            $table->string('no_akaun_bank')->nullable();
            $table->string('lampiran_ic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penceramah', function (Blueprint $table) {
            $table->dropColumn('no_akaun_bank');
            $table->dropColumn('lampiran_ic');
        });
    }
}

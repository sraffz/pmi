<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\DaftarProgram::class, function (Faker $faker) {
    return [
        'url_sijil' => $faker->unique()->uuid,
        'id_pengguna' => User::whereRoleIs('individu')->get()->random(),
        'id_program' => App\Models\Program::all(['id_program'])->random(),
        'id_pendaftar' => App\Models\User::all(['id_pengguna'])->random(),
        'tarikh_daftar'=>$faker->date,
        'status_pengesahan'=>$faker->numberBetween(0,1),
        'status_kajiselidik'=>$faker->numberBetween(0,1),
        'status_kehadiran'=>$faker->numberBetween(0,1),
    ];
});

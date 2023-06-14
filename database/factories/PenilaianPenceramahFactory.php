<?php

use App\Models\Program;
use Faker\Generator as Faker;

$factory->define(App\Models\PenilaianPenceramah::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ms_MY');
    $program = Program::all()->random();
    $penceramah = $program->senaraiPenceramah()->get()->random();
    return [
        'id_penceramah' => $penceramah->id_penceramah,
        'id_program' => $program->id_program,
        'id_peserta' => App\Models\User::all(['id_pengguna'])->random(),
        'soalan1' => $faker->numberBetween(1,5),
        'soalan2' => $faker->numberBetween(1,5),
        'soalan3' => $faker->numberBetween(1,5),
       
    ];
});

<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\KajiSelidik::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ms_MY');
    return [
        'id_pengguna' => User::whereRoleIs('individu')->get()->random(),
        'peringkat' => $faker->word,
        'gred_jawatan' => $faker->numerify('Hello ###'),
        'program' => App\Models\Program::all(['id_program'])->random(),
        'penilaian_keseluruhan' => $faker->numberBetween(1,5),
        'penilaian_kemudahan' => $faker->numberBetween(1,5),
        'penilaian_bahan' => $faker->numberBetween(1,5),
        'penambahbaikan' => $faker->sentence(),
        'cadangan' => $faker->sentence(),
        
    ];

});

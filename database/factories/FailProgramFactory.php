<?php

use Faker\Generator as Faker;

    $factory->define(App\Models\FailProgram::class, function (Faker $faker) {
        $faker = \Faker\Factory::create('ms_MY');
    return [
        //
        'id_program' => App\Models\Program::all(['id_program'])->random(),
        'nama_fail' => $faker->randomLetter,
        'jenis_fail'=> $faker->fileExtension,
        'lokasi'  => $faker->randomLetter,
    ];
});


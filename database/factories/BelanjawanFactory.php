<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\Models\Belanjawan::class, function (Faker $faker) {
    return [
        'id_pentadbir'=> User::whereRoleIs('urusetia')->get()->random(),
        'bayaran_makanan' => $faker->randomFloat(2,0,1000),
        'butiran_makanan' => $faker->sentence(),
        'bayaran_cenderahati' => $faker->randomFloat(2,0,1000),
        'butiran_cenderahati' => $faker->sentence(),
        'bayaran_penceramah' => $faker->randomFloat(2,0,1000),
        'butiran_penceramah' => $faker->sentence(),
        'bayaran_fasilitator' => $faker->randomFloat(2,0,1000),
        'butiran_fasilitator' => $faker->sentence(),
        'bayaran_penginapan' => $faker->randomFloat(2,0,1000),
        'butiran_penginapan' => $faker->sentence(),
        'bayaran_tempat' => $faker->randomFloat(2,0,1000),
        'butiran_tempat' => $faker->sentence(),
        'bayaran_tiraiBelakang' => $faker->randomFloat(2,0,1000),
        'butiran_tiraiBelakang' => $faker->sentence(),
        'bayaran_tiket' => $faker->randomFloat(2,0,1000),
        'butiran_tiket' => $faker->sentence(),
        'bayaran_sijil' => $faker->randomFloat(2,0,1000),
        'butiran_sijil' => $faker->sentence(),
        'jumlah' => $faker->randomFloat(2,0,1000)

    ];
});

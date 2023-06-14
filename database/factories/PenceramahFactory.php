<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Penceramah::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ms_MY');
    return [
       
        'nama_penceramah' => $faker->name,
        'no_kad_pengenalan' => $faker->unique()->myKadNumber,
        'no_telefon'=> $faker->mobileNumber,
        'alamat1' => $faker->buildingNumber,
        'alamat2' => $faker->streetAddress,
        'alamat3' => $faker->township,
        'poskod'  => $faker->postcode,
        'bandar'  => $faker ->city,

        //
    ];
});

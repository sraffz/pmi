<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ms_MY');
    return [
        'id_pendaftar' => null,
        'nama_penuh' => $faker->name,
        'nama_singkatan' => $faker->firstName,
        'no_kad_pengenalan' => $faker->unique()->myKadNumber,
        'email' => $faker->unique()->freeEmail,
        'no_telefon'=> $faker->mobileNumber,
        'kategori' => App\Models\KategoriPengguna::all(['id_kategori_pengguna'])->random(),
        'katalaluan' => Hash::make('user@EPPST2020'),
        'alamat' => $faker->address,
        'status_perakui_sah' => true,
        'status_aktif' => $faker->randomElement([0,1]),
        'status_katalaluan' => $faker->randomElement([0,1]),
        'remember_token' => str_random(30),

    ];
});

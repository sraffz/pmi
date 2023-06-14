<?php

use App\Models\Kehadiran;
use App\Models\Program;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define( Kehadiran::class, function (Faker $faker) {
    return [
        'id_pengguna'=> User::whereRoleIs('individu')->get()->random(),
        'id_program'=> Program::all(['id_program']) ->random(),

    ];
});

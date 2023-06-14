<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PenceramahProgram::class, function (Faker $faker) {
    return [ 
        'id_penceramah' => App\Models\Penceramah::all(['id_penceramah'])->random(),
        'id_program' =>App\Models\Program::all(['id_program'])->random(),
    ];
});

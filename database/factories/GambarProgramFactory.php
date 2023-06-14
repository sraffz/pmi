<?php

use App\Models\GambarProgram;
use App\Models\Program;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;

$factory->define(GambarProgram::class, function (Faker $faker) {
    
    if (App::environment(['production','testing'])) 
    {
        $path = '../storage/app/public/lampiran/gambar_program';
        $src = '../public/images/test';
    }
    elseif (App::environment(['local'])) {
        $path = './storage/app/public/lampiran/gambar_program';
        $src = './public/images/test';
    }
    return [
        'id_program'=> Program::all(['id_program']) ->random(),
        'lokasi' => 'gambar_program/'.$faker->file($src, $path, false),
    ];
});

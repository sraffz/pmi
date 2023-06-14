<?php

use App\Models\Program;
use App\Models\TempatProgram;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

$factory->define(Program::class, function (Faker $faker) {
    if (App::environment(['production','testing'])) 
    {
        $path = '../storage/app/public/lampiran/poster_program';
        $src = '../public/images/test';
    }
    elseif (App::environment(['local'])) {
        $path = './storage/app/public/lampiran/poster_program';
        $src = './public/images/test';
    }
    File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
    $tarikhMula = $faker->dateTimeBetween('-5 years');
    $tarikhAkhir = Carbon::instance($tarikhMula)->addDay(rand(0,3));
    return
     [
        'qrcode_kehadiran'  => $faker->unique()->uuid,
        'id_pendaftar' => User::whereRoleIs('superadmin')->get()->random(),
        'tempat' => TempatProgram::all(['id'])->random(),
        'nama_program'=>$faker->realText(30),
        'anjuran'=> 'Bahagian Pengurusan Teknologi Maklumat',
        'deskripsi_program'=>$faker->text(200),
        'jenis_program'=>$faker->sentence,
        'tarikh_mula'=> $tarikhMula,
        'tarikh_akhir'=> $tarikhAkhir,
        'masa'=> '2:00 Petang',
        'golongan_sasar'=>$faker->sentence,
        'yuran'=>$faker->randomFloat(2,0,100),
        'kuota_peserta'=>$faker->numberBetween(1,300),
        'pengurus_program'=> User::whereRoleIs('urusetia')->get()->random(),
        'objektif'=>$faker->text(200),
        'impak'=>$faker->text(200),
        'poster_program'=> 'poster_program/'.$faker->file($src, $path, false),
        'status_aktif'=>$faker->numberBetween(0,1),
        'status_penyertaan'=>$faker->numberBetween(0,1),
        'status_kehadiran'=>$faker->numberBetween(0,1),

    ];
});

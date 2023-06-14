<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (App::environment(['local','testing'])) {

            Storage::disk('public')->deleteDirectory('lampiran');
            Storage::disk('public')->makeDirectory('lampiran');
            Storage::disk('lampiran')->makeDirectory('gambar_program');
            Storage::disk('lampiran')->makeDirectory('poster_program');
        
            $this->call(KategoriPenggunaSeeder::class);
            $this->call(LaratrustSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(TempatProgramSeeder::class);
            $this->call(ProgramSeeder::class);
            $this->call(DaftarProgramSeeder::class);
            $this->call(PenceramahSeeder::class);
            $this->call(PenceramahProgramSeeder::class);
            $this->call(KehadiranSeeder::class);
            $this->call(KajiSelidikSeeder::class);
            $this->call(FailProgramSeeder::class);
            $this->call(GambarProgramSeeder::class);
            $this->call(PenilaianPenceramahSeeder::class);
        }

        if (App::environment('production')) {

            Storage::disk('lampiran')->deleteDirectory('gambar_program');
            Storage::disk('lampiran')->deleteDirectory('poster_program');
        
            $this->call(KategoriPenggunaSeeder::class);
            $this->call(LaratrustSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(TempatProgramSeeder::class);
        }
        
    }
}

<?php

use Illuminate\Database\Seeder;

class KategoriPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiKategoriPengguna = [
            
            [
                'kategori'=> 'Penjawat Awam',
            ], 
            [
                'kategori'=> 'Imam',
            ], 
            [
                'kategori'=> 'Penghulu',
            ],
            [
                'kategori'=> 'Armalah',
            ],
            [
                'kategori'=> 'Pelajar Sekolah',
            ],
            [
                'kategori'=> 'Orang Awam',
            ]

       ];

       foreach ($senaraiKategoriPengguna as $kategoriPengguna) {
        App\Models\KategoriPengguna::firstOrCreate($kategoriPengguna);
    }

    }
}

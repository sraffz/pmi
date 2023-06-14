<?php

use App\Models\TempatProgram;
use Illuminate\Database\Seeder;

class TempatProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senaraiTempat = [
            
            [
                'nama_tempat'=> 'Dewan Bunga Teratai, Kompleks Kota Darulnaim',
            ], 
            [
                'nama_tempat'=> 'Bilik Gerakan Negeri, Kompleks Kota Darulnaim, Kota Bharu Kelantan',
            ], 
            [
                'nama_tempat'=> 'Dewan Utama Kompleks Islam Jubli Perak Sultan Ismail Petra, Panji, Kota Bharu',
            ], 
            [
                'nama_tempat'=> 'Kelantan ICT Gateway Sdn Bhd',
            ], 
            [
                'nama_tempat'=> 'Dewan Besar Balai Islam Lundang',
            ], 
            [
                'nama_tempat'=> 'Makmal ICT, BPTM, SUK',
            ], 
            [
                'nama_tempat'=> 'Secara Maya',
            ], 
        ];

        foreach ($senaraiTempat as $tempat) {
            TempatProgram::firstOrCreate($tempat);
        }
    }
}

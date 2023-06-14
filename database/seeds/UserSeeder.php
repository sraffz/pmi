<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('pengguna')->truncate();
        Schema::enableForeignKeyConstraints();

        if (App::environment(['local','testing'])) {
            $tester = factory(User::class)->create();
            $tester->update([
                'no_kad_pengenalan' => '930106036767',
                'nama_singkatan' => 'Awais',
                'nama_penuh' => 'Awais Karni Bin Ahmad',
                'email' => 'awais@kelantan.gov.my',
                'status_perakui_sah' => 1,
                'status_aktif' => 1,
                'status_katalaluan' => 1,
                'katalaluan' => Hash::make('123'),
            ]);
            $tester->attachRoles(['superadmin','individu']);

            $urusetia = factory(User::class)->create();
            $urusetia->update([
                'no_kad_pengenalan' => 'urusetia',
                'nama_singkatan' => 'Faiz',
                'nama_penuh' => 'Faiz Rohadi',
                'email' => 'faizrohadi@kelantan.gov.my',
                'status_perakui_sah' => 1,
                'status_aktif' => 1,
                'status_katalaluan' => 1,
                'katalaluan' => Hash::make('123'),
            ]);
            $urusetia->attachRoles(['urusetia']);

            $individu = factory(User::class)->create();
            $individu->update([
                'no_kad_pengenalan' => 'individu',
                'nama_singkatan' => 'Haniff',
                'nama_penuh' => 'Haniff Hakimi',
                'email' => 'haniffhakimi@kelantan.gov.my',
                'status_perakui_sah' => 1,
                'status_aktif' => 1,
                'status_katalaluan' => 1,
                'katalaluan' => Hash::make('123'),
            ]);
            $individu->attachRoles(['individu']);

            $users = factory(User::class, 2)->create();
            foreach($users as $user){
                $user->attachRole('superadmin');
            }

            $users = factory(User::class, 5)->create();
            foreach($users as $user){
                $user->attachRole('pengurusan');
            }

            $users = factory(User::class, 5)->create();
            foreach($users as $user){
                $user->attachRole('urusetia');
            }

            $users = factory(User::class, 50)->create();
            foreach($users as $user){
                $user->attachRole('individu');
                
                
                $user->save();
            }    
        }
        
        if (App::environment('production')) {
            $admin = factory(User::class)->create();
            $admin->update([
                'no_kad_pengenalan' => 'bptmsuk',
                'nama_singkatan' => 'Admin',
                'nama_penuh' => 'Admin BPTM',
                'email' => 'bptm@kelantan.gov.my',
                'no_telefon' => '097481957',
                'alamat' => 'BPTM',
                'status_perakui_sah' => 1,
                'status_aktif' => 1,
                'status_katalaluan' => 1,
                'katalaluan' => Hash::make('super@BPTM2021'),
            ]);
            $admin->attachRoles(['superadmin','individu']);
        }


    }
}

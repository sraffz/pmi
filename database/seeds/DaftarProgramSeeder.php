<?php

use Illuminate\Database\Seeder;

class DaftarProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        factory(App\Models\DaftarProgram::class, 1000)->create();

        

    }
}

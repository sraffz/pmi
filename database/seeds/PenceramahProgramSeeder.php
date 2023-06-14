<?php

use Illuminate\Database\Seeder;

class PenceramahProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\PenceramahProgram::class,28)->create();
    }
}

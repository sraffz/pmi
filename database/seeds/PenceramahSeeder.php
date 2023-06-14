<?php

use Illuminate\Database\Seeder;

class PenceramahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Penceramah::class,28)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class BelanjawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Belanjawan::class,10)->create();
    }
}

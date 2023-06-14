<?php

use Illuminate\Database\Seeder;

class KajiSelidikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\KajiSelidik::class, 1000)->create();
    }
}


<?php

use Illuminate\Database\Seeder;

class PenilaianPenceramahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\PenilaianPenceramah::class, 3000)->create();
    }
}


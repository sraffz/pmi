<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $program = factory(App\Models\Program::class, 30)
            ->create()
            ->each(function ($u) {
                $u->belanjawan()->save(factory(App\Models\Belanjawan::class)->make());
                $u->senaraiPenceramah()->save(factory(App\Models\Penceramah::class)->make());
            });
    }
}

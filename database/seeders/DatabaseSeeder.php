<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenerosSeeder::class);
        $this->call(ServicioSeeder::class);
        \App\Models\Persona::factory(10)->create();
    }
}

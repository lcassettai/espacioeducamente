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
        $this->call(RolesSeeder::class);
        \App\Models\Persona::factory(1)->create();
    }
}

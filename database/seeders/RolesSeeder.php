<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'rol' => 'Administrador'
        ]);

        DB::table('roles')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'rol' => 'Prestador'
        ]);

        DB::table('roles')->insert([
            'created_at' => now(),
            'updated_at' => now(),
            'rol' => 'Paciente'
        ]);
    }
}

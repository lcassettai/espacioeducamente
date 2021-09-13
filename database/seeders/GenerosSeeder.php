<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'sigla' => 'ma',
            'genero' => 'Masculino',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('generos')->insert([
            'sigla' => 'fe',
            'genero' => 'Femenino',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('generos')->insert([
            'sigla' => 'nb',
            'genero' => 'No binario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('generos')->insert([
            'sigla' => 'tr',
            'genero' => 'Transexual',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('generos')->insert([
            'sigla' => 'ot',
            'genero' => 'Otro',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

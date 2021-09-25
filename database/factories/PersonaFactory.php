<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'Luciano',
            'apellido' => 'Cassettai',
            'cuit' => '',
            'documento' => '35004172',
            'telefono' => '3764902330',
            'fecha_nacimiento' => now(),
            'esta_activo' => true,
            'genero_sigla' => 'ma',
        ];
    }
}

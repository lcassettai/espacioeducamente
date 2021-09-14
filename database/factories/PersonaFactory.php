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
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->name(),
            'cuit' => $this->faker->randomNumber(),
            'documento' => $this->faker->randomNumber(),
            'telefono' => $this->faker->randomNumber(),
            'fecha_nacimiento' => now(),
            'esta_activo' => true,
            'genero_sigla' => 'ma',
        ];
    }
}

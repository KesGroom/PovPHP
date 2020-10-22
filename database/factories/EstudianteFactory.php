<?php

namespace Database\Factories;

use App\Models\Acudiente;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estudiante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $acus = Acudiente::all()->values('id');
        return [
            'acudiente' => $this->faker->randomElement($acus),
            'tiempo_servicio'=> 0,
            'estado' => 'Activo'
        ];
    }
}

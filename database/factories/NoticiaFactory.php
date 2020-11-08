<?php

namespace Database\Factories;

use App\Models\Categoria_noticia;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'estado' => 'Activo',
            'titulo' => $this->faker->sentence(4),
            'subtitulo' => $this->faker->sentence(5),
            'informacion' => $this->faker->paragraph(),
            'imagen' => $this->faker->randomElement(['Bodies Into.jpg', 'Flag Colombia.jpg', 'Project Computer.jpg', 'Science people.jpg']),
            'coordinador' => User::where([['estado', 'Activo'], ['rol', 1]])->get()->random()

        ];
    }
}

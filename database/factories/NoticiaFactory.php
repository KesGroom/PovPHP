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
            'subtitulo' => $this->faker->sentence(6),
            'informacion' => $this->faker->paragraph(),
            'image' => $this->faker->randomElement(['Bodies Into.jpg', 'Flag Colombia.jpg', 'Project Compute.jpg', 'Sciencepeople.jpg']),
            'categoria' => Categoria_noticia::where('estado', 'Activo')->random()->id,
            'coordinador' => User::where([['estado', 'Activo'], ['rol', 1]])->random()->id

        ];
    }
}

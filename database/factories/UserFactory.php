<?php

namespace Database\Factories;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Se elije aleatoriamente entre las dos opciones de genero
        $genero = $this->faker->randomElement(['Masculino', 'Femenino']);
        //Se genera un nombre según el genero
        if ($genero == 'Masculino') {
            $name = $this->faker->firstNameMale();
        } else {
            $name = $this->faker->firstNameFemale();
        };

        // //Generamos una fecha con faker para asignarla como fecha de nacimiento
        // $fecha = $this->faker->date('Y-m-d','2012-01-01');
        // //Se convierte la fecha a entero para calcular la edad del usuario(Se calcula según el año)
        // //Fecha nacimiento
        // $fechaEntero = strtotime($fecha);
        // //Fecha actual
        // $nowEntero = strtotime(now());
        // //Se obtiene la edad del usuario
        // $edad = date('Y', $nowEntero) - date('Y', $fechaEntero);
        // //Según la edad del usaurio se le asigna un rol y un tipo de documento
        // if ($edad >= 20) {
        //     $rol = $this->faker->randomElement([1, 2, 4]);
        //     $tipo = 'Cedula de ciudadania';
        // } elseif ($edad >= 18 && $edad < 20) {
        //     $rol = 3;
        //     $tipo = 'Cedula de ciudadania';
        // } elseif ($edad < 18 && $edad >= 7) {
        //     $rol = 3;
        //     $tipo = 'Tarjeta de identidad';
        // }
        //Se returna al usuario creado
        return [
            'id' => $this->faker->numerify('1#########'),
            'name' => $name,
            'apellido' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'direccion' => $this->faker->streetAddress,
            'celular' => $this->faker->numerify('3## ### ####'),
            'telefono_fijo' => $this->faker->numerify('### ####'),
            'genero' => $genero,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'foto_perfil' => 'icon.png',
            'estado' => 'Activo',
            'remember_token' => Str::random(10),
        ];
    }
}

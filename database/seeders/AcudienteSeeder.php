<?php

namespace Database\Seeders;

use App\Models\Acudiente;
use App\Models\User;
use Illuminate\Database\Seeder;

class AcudienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $milisegundosLimiteInferior = strtotime('1970-01-01');
        $milisegundosLimiteSuperior = strtotime('1999-12-31');
        // Buscamos un número aleatorio entre esas dos fechas
        $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        $fecha = date('Y-m-d', $milisegundosAleatorios);

        User::factory(100)->create([
            'rol' => 4,
            'tipo_documento' => 'Cedula de ciudadania',
            'fecha_nacimiento' => $fecha
        ]);

        $acus = User::where('rol', 4)->get();
        $acus->each(function ($acu) {
            $acudiente = new Acudiente();
            $acudiente->id = $acu->id;
            $acudiente->estado = 'Activo';
            $acudiente->save();
        });
    }
}

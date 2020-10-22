<?php

namespace Database\Seeders;

use App\Models\Acudiente;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\User;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = Curso::all();

        $cursos->each(function ($curso) {
            switch ($curso->grado) {
                case 1:
                    $milisegundosLimiteInferior = strtotime('2012-01-01');
                    $milisegundosLimiteSuperior = strtotime('2014-12-31');
                    break;
                case 2:
                    $milisegundosLimiteInferior = strtotime('2011-01-01');
                    $milisegundosLimiteSuperior = strtotime('2013-12-31');
                    break;
                case 3:
                    $milisegundosLimiteInferior = strtotime('2010-01-01');
                    $milisegundosLimiteSuperior = strtotime('2012-12-31');
                    break;
                case 4:
                    $milisegundosLimiteInferior = strtotime('2009-01-01');
                    $milisegundosLimiteSuperior = strtotime('2011-12-31');
                    break;
                case 5:
                    $milisegundosLimiteInferior = strtotime('2008-01-01');
                    $milisegundosLimiteSuperior = strtotime('2010-12-31');
                    break;
                case 6:
                    $milisegundosLimiteInferior = strtotime('2007-01-01');
                    $milisegundosLimiteSuperior = strtotime('2009-12-31');
                    break;
                case 7:
                    $milisegundosLimiteInferior = strtotime('2006-01-01');
                    $milisegundosLimiteSuperior = strtotime('2008-12-31');
                    break;
                case 8:
                    $milisegundosLimiteInferior = strtotime('2005-01-01');
                    $milisegundosLimiteSuperior = strtotime('2007-12-31');
                    break;
                case 9:
                    $milisegundosLimiteInferior = strtotime('2004-01-01');
                    $milisegundosLimiteSuperior = strtotime('2006-12-31');
                    break;
                case 10:
                    $milisegundosLimiteInferior = strtotime('2003-01-01');
                    $milisegundosLimiteSuperior = strtotime('2005-12-31');
                    break;
                case 11:
                    $milisegundosLimiteInferior = strtotime('2002-01-01');
                    $milisegundosLimiteSuperior = strtotime('2004-12-31');
                    break;
            }
            // Buscamos un número aleatorio entre esas dos fechas
            $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
            $fecha = date('Y-m-d', $milisegundosAleatorios);
            User::factory(20)->create([
                'tipo_documento' => 'Tarjeta de identidad',
                'rol' => 3,
                'fecha_nacimiento' => $fecha
            ]);

            $est = User::where('rol', 3)
                ->latest()
                ->take(20)
                ->get();

            foreach ($est as $estu) {
                if ($curso->grado > 9) {
                    $servicio = 'Disponible';
                } else {
                    $servicio = 'No aplica';
                }
                Estudiante::factory(1)->create([
                    'id' => $estu->id,
                    'curso' => $curso->id,
                    'estado_servicio_social' => $servicio
                ]);
            }
        });
    }
}

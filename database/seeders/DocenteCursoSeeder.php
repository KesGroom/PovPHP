<?php

namespace Database\Seeders;

use App\Models\Area_grado;
use App\Models\Curso;
use App\Models\Docente_curso;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocenteCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = Grado::all();
        foreach ($grados as $grado) {
            $cursos = Curso::where('grado', $grado->id)->get();
            foreach ($cursos as $curso) {
                $areas = Area_grado::where('grado', $grado->id)->get();
                foreach ($areas as $area) {
                    $materias = Materia::where('area', $area->id)->get();
                    $milisegundosLimiteInferior = strtotime('1970-01-01');
                    $milisegundosLimiteSuperior = strtotime('1999-12-31');
                    $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
                    $fecha = date('Y-m-d', $milisegundosAleatorios);
                    User::factory(1)->create([
                        'rol' => 2,
                        'tipo_documento' => 'Cedula de ciudadania',
                        'fecha_nacimiento' => $fecha
                    ]);
                    foreach ($materias as $materia) {
                        $user = User::where('rol', 2)->orderBy('created_at', 'desc')->first();
                        $dc = new Docente_curso();
                        $dc->docente->$user->id;
                        $dc->materia->$materia->id;
                        $dc->curso->$curso->id;
                        $dc->save();
                    }
                }
            }
        }
    }
}

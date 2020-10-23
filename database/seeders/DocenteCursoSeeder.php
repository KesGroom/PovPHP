<?php

namespace Database\Seeders;

use App\Models\Area;
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
        $milisegundosLimiteInferior = strtotime('1970-01-01');
        $milisegundosLimiteSuperior = strtotime('1999-12-31');
        $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);
        $grados = Grado::all();
        $gradoAnterior = null;
        foreach ($grados as $grado) {
            $cursos = Curso::where('grado', $grado->id)->get();
            $materias = Materia::all();
            foreach ($materias as $materia) {
                // if ($grado->id > 0 && $grado->id < 8) {
                //     if ($materia->nombre_materia == "Matemáticas") {
                $docMateria = Docente_curso::where('materia', $materia->id)->first();
                if ($docMateria) {
                    $nivel = Grado::where('id', $docMateria->curso)->first();
                    if ($gradoAnterior) {
                        if ($nivel->nivel_educativo == $gradoAnterior->nivel_educativo) {
                            $user = User::where('id', $docMateria->docente)->first();
                        } else {
                            $fecha = date('Y-m-d', $milisegundosAleatorios);
                            User::factory(1)->create([
                                'rol' => 2,
                                'tipo_documento' => 'Cedula de ciudadania',
                                'fecha_nacimiento' => $fecha
                            ]);
                            $user = User::where('rol', 2)->orderBy('created_at', 'desc')->first();
                        }
                    }else{
                        $fecha = date('Y-m-d', $milisegundosAleatorios);
                        User::factory(1)->create([
                            'rol' => 2,
                            'tipo_documento' => 'Cedula de ciudadania',
                            'fecha_nacimiento' => $fecha
                        ]);
                        $user = User::where('rol', 2)->orderBy('created_at', 'desc')->first();
                    }
                }else{
                    $fecha = date('Y-m-d', $milisegundosAleatorios);
                    User::factory(1)->create([
                        'rol' => 2,
                        'tipo_documento' => 'Cedula de ciudadania',
                        'fecha_nacimiento' => $fecha
                    ]);
                    $user = User::where('rol', 2)->orderBy('created_at', 'desc')->first();
                }

                foreach ($cursos as $curso) {
                    $dc = new Docente_curso();
                    $dc->docente = $user->id;
                    $dc->materia = $materia->id;
                    $dc->curso = $curso->id;
                    $dc->estado = 'Activo';
                    $dc->save();
                }
                //     }
                // }
            }
            $gradoAnterior = $grado;
        }
    }
}

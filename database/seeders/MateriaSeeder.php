<?php

namespace Database\Seeders;

use App\Models\Area_grado;
use App\Models\Materia;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = Area_grado::all();
        $areas->each(function ($area) {
            switch ($area->area) {
                case 1:
                    if ($area->grado < 8) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Matemáticas';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 7 && $area->grado < 10) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Algebra';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 4 && $area->grado < 8) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Geometria';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado == 11) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Calculo';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 9) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Trigonometria';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();

                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Fisica';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
                case 2:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Danzas';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();
                    break;
                case 3:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Tecnología';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();
                    break;
                case 4:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Educación física';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();
                    break;
                case 5:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Ingles';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Español';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Etica';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Religion';
                    $mat->area = $area->id;
                    $mat->cantidad_competencias = 3;
                    $mat->save();

                    if ($area->grado > 5 && $area->grado < 10) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Ambiental';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
                case 6:
                    if ($area->grado > 0 && $area->grado < 10) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Sociales';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 0 && $area->grado < 11) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Catedra';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 9) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Politicas';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();

                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Filosofia';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
                case 7:
                    if ($area->grado > 0 && $area->grado < 10) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Ciencias naturales';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    if ($area->grado > 9) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Química';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
                case 8:
                    if ($area->grado > 0 && $area->grado < 9) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Artes visuales';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }

                    if ($area->grado > 8) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Artes Plasticas';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
                case 9:
                    if ($area->grado > 5) {
                        $mat = new Materia();
                        $mat->estado = 'Activo';
                        $mat->nombre_materia = 'Música';
                        $mat->area = $area->id;
                        $mat->cantidad_competencias = 3;
                        $mat->save();
                    }
                    break;
            }
        });
    }
}

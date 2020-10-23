<?php

namespace Database\Seeders;

use App\Models\Area;
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
        $areas = Area::all();
        $areas->each(function ($area) {
            switch ($area->id) {
                case 1:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Matemáticas';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Algebra';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Geometria';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Calculo';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Trigonometria';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Física';
                    $mat->area = $area->id;
                    $mat->save();

                    break;
                case 2:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Danzas';
                    $mat->area = $area->id;
                    $mat->save();
                    break;
                case 3:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Tecnología';
                    $mat->area = $area->id;
                    $mat->save();
                    break;
                case 4:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Educación física';
                    $mat->area = $area->id;
                    $mat->save();
                    break;
                case 5:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Ingles';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Español';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Etica';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Religion';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Ambiental';
                    $mat->area = $area->id;
                    $mat->save();

                    break;
                case 6:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Sociales';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Cátedra';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Políticas';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Filosofía';
                    $mat->area = $area->id;
                    $mat->save();

                    break;
                case 7:

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Ciencias naturales';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Química';
                    $mat->area = $area->id;
                    $mat->save();

                    break;
                case 8:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Artes visuales';
                    $mat->area = $area->id;
                    $mat->save();

                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Artes Plasticas';
                    $mat->area = $area->id;
                    $mat->save();
                    break;
                case 9:
                    $mat = new Materia();
                    $mat->estado = 'Activo';
                    $mat->nombre_materia = 'Música';
                    $mat->area = $area->id;
                    $mat->save();
                    break;
            }
        });
    }
}

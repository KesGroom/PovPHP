<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matematicas = new Area();
        $matematicas->nombre_area = 'Matemáticas';
        $matematicas->estado = 'Activo';
        $matematicas->save();
        
        $Danzas = new Area();
        $Danzas->nombre_area = 'Danzas';
        $Danzas->estado = 'Activo';
        $Danzas->save();

        $Tecnologia = new Area();
        $Tecnologia->nombre_area = 'Tecnología';
        $Tecnologia->estado = 'Activo';
        $Tecnologia->save();

        $Educacion_fisica = new Area();
        $Educacion_fisica->nombre_area = 'Educación física';
        $Educacion_fisica->estado = 'Activo';
        $Educacion_fisica->save();

        $Humanidades = new Area();
        $Humanidades->nombre_area = 'Humanidades';
        $Humanidades->estado = 'Activo';
        $Humanidades->save();

        $Ciencias_sociales = new Area();
        $Ciencias_sociales->nombre_area = 'Ciencias sociales';
        $Ciencias_sociales->estado = 'Activo';
        $Ciencias_sociales->save();

        $Ciencias_naturales = new Area();
        $Ciencias_naturales->nombre_area = 'Ciencias naturales';
        $Ciencias_naturales->estado = 'Activo';
        $Ciencias_naturales->save();

        $Artes = new Area();
        $Artes->nombre_area = 'Artes';
        $Artes->estado = 'Activo';
        $Artes->save();

        $musica = new Area();
        $musica->nombre_area = 'Música';
        $musica->estado = 'Activo';
        $musica->save();

    }
}

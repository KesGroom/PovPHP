<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coor = new Rol();
        $coor->nombre_rol = 'Coordinador';
        $coor->estado = 'Activo';
        $coor->save();

        $doc = new Rol();
        $doc->nombre_rol = 'Docente';
        $doc->estado = 'Activo';
        $doc->save();

        $est = new Rol();
        $est->nombre_rol = 'Estudiante';
        $est->estado = 'Activo';
        $est->save();

        $acu = new Rol();
        $acu->nombre_rol = 'Acudiente';
        $acu->estado = 'Activo';
        $acu->save();
    }
}

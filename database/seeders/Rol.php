<?php

namespace Database\Seeders;

use App\Models\Rol as ModelsRol;
use Illuminate\Database\Seeder;

class Rol extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new ModelsRol();
        $rol->id = 1;
        $rol->nombre_rol = "Admin";
        $rol->estado ="Activo";
        $rol->save();
        $rol = new ModelsRol();
        $rol->id = 2;
        $rol->nombre_rol = "docente";
        $rol->estado ="Activo";
        $rol->save();
        $rol = new ModelsRol();
        $rol->id = 3;
        $rol->nombre_rol = "estudiante";
        $rol->estado ="Activo";
        $rol->save();
        $rol = new ModelsRol();
        $rol->id = 4;
        $rol->nombre_rol = "acudiente";
        $rol->estado ="Activo";
        $rol->save();
    }
}

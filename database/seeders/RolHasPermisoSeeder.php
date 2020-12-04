<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Rol_has_permiso;
use Illuminate\Database\Seeder;

class RolHasPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coor = 1;
        $doc = 2;
        $est = 3;
        $acu = 4;

        $users = Permiso::where('permiso_padre', 1)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 1;
        $rhp->save();
        foreach ($users as $user) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $coor;
            $rhp->permiso = $user->id;
            $rhp->save();
        }

        $servicio = Permiso::where('permiso_padre', 4)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 4;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $est;
        $rhp->permiso = 4;
        $rhp->save();
        foreach ($servicio as $service) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $coor;
            $rhp->permiso = $service->id;
            $rhp->save();
            $rhp = new Rol_has_permiso();
            $rhp->rol = $est;
            $rhp->permiso = $service->id;
            $rhp->save();
        }

        $pqrs = Permiso::where('permiso_padre', 7)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 7;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $acu;
        $rhp->permiso = 7;
        $rhp->save();
        foreach ($pqrs as $qccs) {
            if ($qccs->id == 9) {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $acu;
                $rhp->permiso = $qccs->id;
                $rhp->save();
            } else {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $coor;
                $rhp->permiso = $qccs->id;
                $rhp->save();
            }
        }

        $citas = Permiso::where('permiso_padre', 10)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 10;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $acu;
        $rhp->permiso = 10;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $doc;
        $rhp->permiso = 10;
        $rhp->save();
        foreach ($citas as $cita) {
            if ($cita->id == 11) {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $acu;
                $rhp->permiso = $cita->id;
                $rhp->save();
            } else {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $coor;
                $rhp->permiso = $cita->id;
                $rhp->save();
                $rhp = new Rol_has_permiso();
                $rhp->rol = $acu;
                $rhp->permiso = $cita->id;
                $rhp->save();
                $rhp = new Rol_has_permiso();
                $rhp->rol = $doc;
                $rhp->permiso = $cita->id;
                $rhp->save();
            }
        }

        $adminAca = Permiso::where('permiso_padre', 13)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 13;
        $rhp->save();
        foreach ($adminAca as $admin) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $coor;
            $rhp->permiso = $admin->id;
            $rhp->save();
        }

        $noticias = Permiso::where('permiso_padre', 16)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $coor;
        $rhp->permiso = 16;
        $rhp->save();
        foreach ($noticias as $noticia) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $coor;
            $rhp->permiso = $noticia->id;
            $rhp->save();
        }

        $Portafolio = Permiso::where('permiso_padre', 20)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $acu;
        $rhp->permiso = 20;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $est;
        $rhp->permiso = 20;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $doc;
        $rhp->permiso = 20;
        $rhp->save();
        foreach ($Portafolio as $actividad) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $doc;
            $rhp->permiso = $actividad->id;
            $rhp->save();
            $rhp = new Rol_has_permiso();
            $rhp->rol = $acu;
            $rhp->permiso = $actividad->id;
            $rhp->save();
            $rhp = new Rol_has_permiso();
            $rhp->rol = $est;
            $rhp->permiso = $actividad->id;
            $rhp->save();
        }

        $agenda = Permiso::where('permiso_padre', 22)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $acu;
        $rhp->permiso = 22;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $est;
        $rhp->permiso = 22;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $doc;
        $rhp->permiso = 22;
        $rhp->save();
        foreach ($agenda as $obser) {
            if ($obser->id == 23) {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $doc;
                $rhp->permiso = $obser->id;
                $rhp->save();
            } else {
                $rhp = new Rol_has_permiso();
                $rhp->rol = $doc;
                $rhp->permiso = $obser->id;
                $rhp->save();
                $rhp = new Rol_has_permiso();
                $rhp->rol = $acu;
                $rhp->permiso = $obser->id;
                $rhp->save();
                $rhp = new Rol_has_permiso();
                $rhp->rol = $est;
                $rhp->permiso = $obser->id;
                $rhp->save();
            }
        }
        $registros = Permiso::where('permiso_padre', 25)->get();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $acu;
        $rhp->permiso = 25;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $est;
        $rhp->permiso = 25;
        $rhp->save();
        $rhp = new Rol_has_permiso();
        $rhp->rol = $doc;
        $rhp->permiso = 25;
        $rhp->save();
        foreach ($registros as $registro) {
            $rhp = new Rol_has_permiso();
            $rhp->rol = $doc;
            $rhp->permiso = $registro->id;
            $rhp->save();
            $rhp = new Rol_has_permiso();
            $rhp->rol = $acu;
            $rhp->permiso = $registro->id;
            $rhp->save();
            $rhp = new Rol_has_permiso();
            $rhp->rol = $est;
            $rhp->permiso = $registro->id;
            $rhp->save();
        }


        //------------------------------------------
    }
}

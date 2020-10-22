<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Grado;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = Grado::all();

        $grados->each(function ($grado) {
            if($grado->id == 10 || $grado->id == 10){
                $cant = 3;
            }else{
                $cant = 4;
            }
            for ($i = 0; $i < $cant; $i++) {
                if ($grado->nivel_educativo == 'Primaria') {
                    $salon = '5';
                } elseif ($grado->nivel_educativo == 'Secundaria') {
                    $salon = '4';
                } else {
                    $salon = '3';
                }
                $curso = new Curso();
                $curso->curso = $grado->id . '0' . ($i + 1);
                $p = $i + 1;
                $salonValidate = Curso::where('salon', $salon . '0' . $p)->first();
                while ($salonValidate != null) {
                    $p++;
                    if ($p > 9) {
                        $salonValidate = Curso::where('salon', $salon . $p)->first();
                    } else {
                        $salonValidate = Curso::where('salon', $salon . '0' . $p)->first();
                    }
                    
                }
                if ($p > 9) {
                    $salon = $salon . $p;
                } else {
                    $salon = $salon . '0' . $p;
                }
                $curso->salon = $salon;
                $curso->estado = 'Activo';
                $curso->grado = $grado->id;
                $curso->save();
                $salon = "";
            }
        });
    }
}

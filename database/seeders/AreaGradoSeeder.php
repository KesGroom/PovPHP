<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Area_grado;
use App\Models\Grado;
use Illuminate\Database\Seeder;

class AreaGradoSeeder extends Seeder
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
            for ($i = 1; $i < 12; $i++) {
                $ag = new Area_grado();
                $grado = Grado::where('id', $i)->first();
                $ag->grado = $grado->id;
                $ag->area = $area->id;
                $ag->estado = 'Activo';
                $ag->cantidad_competencias = 3;
                $ag->save();
            }
        });
    }
}

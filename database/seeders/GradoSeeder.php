<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primero = new Grado();
        $primero->nombre_grado = 'Primero';
        $primero->nivel_educativo = 'Primaria';
        $primero->estado = 'Activo';
        $primero->save();

        $Segundo = new Grado();
        $Segundo->nombre_grado = 'Segundo';
        $Segundo->nivel_educativo = 'Primaria';
        $Segundo->estado = 'Activo';
        $Segundo->save();

        $Tercero = new Grado();
        $Tercero->nombre_grado = 'Tercero';
        $Tercero->nivel_educativo = 'Primaria';
        $Tercero->estado = 'Activo';
        $Tercero->save();

        $Cuarto = new Grado();
        $Cuarto->nombre_grado = 'Cuarto';
        $Cuarto->nivel_educativo = 'Primaria';
        $Cuarto->estado = 'Activo';
        $Cuarto->save();

        $Quinto = new Grado();
        $Quinto->nombre_grado = 'Quinto';
        $Quinto->nivel_educativo = 'Primaria';
        $Quinto->estado = 'Activo';
        $Quinto->save();
        
        $Sexto = new Grado();
        $Sexto->nombre_grado = 'Sexto';
        $Sexto->nivel_educativo = 'Secundaria';
        $Sexto->estado = 'Activo';
        $Sexto->save();
        
        $Septimo = new Grado();
        $Septimo->nombre_grado = 'Septimo';
        $Septimo->nivel_educativo = 'Secundaria';
        $Septimo->estado = 'Activo';
        $Septimo->save();
        
        $Octavo = new Grado();
        $Octavo->nombre_grado = 'Octavo';
        $Octavo->nivel_educativo = 'Secundaria';
        $Octavo->estado = 'Activo';
        $Octavo->save();
        
        $Noveno = new Grado();
        $Noveno->nombre_grado = 'Noveno';
        $Noveno->nivel_educativo = 'Secundaria';
        $Noveno->estado = 'Activo';
        $Noveno->save();
        
        $Decimo = new Grado();
        $Decimo->nombre_grado = 'Decimo';
        $Decimo->nivel_educativo = 'Media';
        $Decimo->estado = 'Activo';
        $Decimo->save();
        
        $Once = new Grado();
        $Once->nombre_grado = 'Once';
        $Once->nivel_educativo = 'Media';
        $Once->estado = 'Activo';
        $Once->save();
        
    }
}

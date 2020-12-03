<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use App\Models\Noticia;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(RolHasPermisoSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(NoticiaSeeder::class);
        // Noticia::factory(4)->create();
        $this->call(AcudienteSeeder::class);
        $this->call(EstudianteSeeder::class);
        $this->call(DocenteCursoSeeder::class);
    }
}

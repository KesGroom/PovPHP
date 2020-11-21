<?php

namespace Database\Seeders;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fourth = new Noticia();
        $fourth->titulo = 'No solo una simple agenda';
        $fourth->subtitulo = 'Enterate de cualquier eventualidad en cualquier momento';
        $fourth->informacion = 'Una nueva agenda se ha empezado a emplear, pero no es de papel, a partir de ahora podrás enterarte de cualquier eventualidad en el momento que el docente lo registre, serás siempre la primera persona en enterarse si algo sucede';
        $fourth->imagen = 'Fourth-New.png';
        $fourth->estado = 'Activo';
        $fourth->coordinador = User::where([['estado', 'Activo'], ['rol', 1]])->get()->random();
        $fourth->save();

        $third = new Noticia();
        $third->titulo = 'Tu opinión si cuenta';
        $third->subtitulo = 'Comunicate con nosotros y te atenderemos';
        $third->informacion = 'Se ha integrado un nuevo sistema de comunicación a tráves de PQRS (Preguntas, Quejas, Reclamos, Sugerencias). Haznos saber tus inquietudes y te responderemos en el menor tiempo posible.';
        $third->imagen = 'Third-New.png';
        $third->estado = 'Activo';
        $third->coordinador = User::where([['estado', 'Activo'], ['rol', 1]])->get()->random();
        $third->save();

        $second = new Noticia();
        $second->titulo = 'Calificaciones, asistencia, servicio social';
        $second->subtitulo = 'Consulta e informate acerca de nuestros procesos';
        $second->informacion = 'Sientete libre de consultar a tiempo real las calificaciones, el promedio acádemico, el registro de asistencia o el estado del servicio social todo a tráves de la web. Sin esperas, sin filas, sin citas.';
        $second->imagen = 'Second-New.png';
        $second->estado = 'Activo';
        $second->coordinador = User::where([['estado', 'Activo'], ['rol', 1]])->get()->random();
        $second->save();

        $first = new Noticia();
        $first->titulo = 'Un nuevo comienzo';
        $first->subtitulo = 'Hemos avanzado para ofrecerles lo mejor';
        $first->informacion = 'Hemos adquirido una nueva herramienta para nuestra gran comunidad institucional, la nueva web de María Cano IED esta aquí y dispone de muchas maneras de ayudar a todos los integrantes de la institución.';
        $first->imagen = 'First-New.png';
        $first->estado = 'Activo';
        $first->coordinador = User::where([['estado', 'Activo'], ['rol', 1]])->get()->random();
        $first->save();
    }
}

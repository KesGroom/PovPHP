<?php

namespace Database\Seeders;

use App\Models\Categoria_noticia;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $artes = new Categoria_noticia();
        $artes->estado = 'Activo';
        $artes->nombre_categoria = 'Artes';
        $artes->save();
        
        $Deportes = new Categoria_noticia();
        $Deportes->estado = 'Activo';
        $Deportes->nombre_categoria = 'Deportes';
        $Deportes->save();

        $Musica = new Categoria_noticia();
        $Musica->estado = 'Activo';
        $Musica->nombre_categoria = 'Música';
        $Musica->save();

        $Reuniones = new Categoria_noticia();
        $Reuniones->estado = 'Activo';
        $Reuniones->nombre_categoria = 'Reuniones';
        $Reuniones->save();
    }
}

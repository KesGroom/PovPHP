<?php

namespace App\Imports;

use App\Models\Noticia as ModelsNoticia;
use App\Noticia;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NewsImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new ModelsNoticia([
            'titulo'     => $row['titulo'],
            'subtitulo'     => $row['subtitulo'],
            'informacion'     => $row['informacion'],
            'categoria' => '4',
            'coordinador' => Auth::user()->id,
            'estado' => 'Activo',
            'imagen' => 'COlegio Frontal.jpg',
        ]);
    }
}

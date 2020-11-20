<?php

namespace App\Exports;

use App\Models\Noticia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class NewsExport implements FromView
{

    use Exportable;
    public function view():View
    {
        return view('exports.news', [
            'news' => Noticia::where('estado', 'Activo')->get(),
        ]);
    }
}

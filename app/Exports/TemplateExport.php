<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateExport implements FromView
{

    use Exportable;

    public $data;
    public $headers;

    public function __construct($data, $headers)
    {
        $this->headers = $headers;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.ExportTemplate', compact('data', 'headers'));
    }
}

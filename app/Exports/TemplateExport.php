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
    public $template;
    public $items_data;

    public function __construct($headers, $data, $template, $items_data)
    {
        $this->headers = $headers;
        $this->template = $template;
        $this->data = $data;
        $this->items_data = $items_data;
    }

    public function view(): View
    {
        return view('exports.ExportTemplate', [
            'headers' => $this->headers, 
            'data' => $this->data, 
            'template' => $this->template,
            'items' => $this->items_data
            ]);
    }
}

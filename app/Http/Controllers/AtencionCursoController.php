<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class AtencionCursoController extends Controller
{
    public function create(){
        return view('atencion_curso.create');
    }
}

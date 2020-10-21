<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function create(){
        return view('grados.create');

    }
    public function store(Request $request){
      $area = new Grado();
      $area->estado = "Activo";

      $area->nombre_grado = $request->nombre_grado;
      $area->nivel_educativo = $request->nivel_educativo;
      $area->save();
      $status = 'Se ha creado un grado';
      return back()->with(compact('status'));
    }
    public function index(){
        $grados = Grado::where('estado','Activo')->get();
        return view('grados.index', compact('grados'));

    }
    public function edit(Grado $grado){
        return view('grados.edit', compact('grado'));

    }
    public function update(Request $request,Grado $grado){
        $grado->estado = "Activo";
        $grado->nombre_grado = $request->nombre_grado;
        $grado->save();
        $status = 'Se ha actualizado el Area';
        return back()->with(compact('status'));
    }
}

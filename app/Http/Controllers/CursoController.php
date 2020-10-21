<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Grado;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function create(){
        $grados = Grado::where('estado','Activo')->get();
        return view('cursos.create', compact('grados'));

    }
    public function store(Request $request){
      $curso = new Curso();
      $curso->estado = "Activo";
      $curso->curso = $request->curso;
      $curso->salon = $request->salon;
      $curso->grado = $request->grado;
      $curso->save();
      $status = 'Se ha creado un Curso';
      return back()->with(compact('status'));
    }
    public function index(){
        $cursos = Curso::where('estado','Activo')->get();
        return view('cursos.index', compact('cursos'));

    }
    public function edit(Curso $curso){
        $grados = Grado::where('estado','Activo')->get();
        return view('cursos.edit', compact('curso','grados'));

    }
    public function update(Request $request,Curso $curso){
      $curso->estado = "Activo";
      $curso->curso = $request->curso;
      $curso->salon = $request->salon;
      $curso->grado = $request->grado;
      $curso->save();
      $status = 'Se ha actualizado un Curso';
      return back()->with(compact('status'));
    }
}

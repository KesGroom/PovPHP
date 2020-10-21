<?php

namespace App\Http\Controllers;

use App\Models\Docente_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteCursoController extends Controller
{
    public function create(){
       return view('docentecurso.create');
    }
    public function store(Request $request){
      $curso = new Docente_curso();
      $curso->estado = "Activo";
      $curso->curso = $request->curso;
      $curso->salon = $request->salon;
      $curso->grado = $request->grado;
      $curso->save();
      $status = 'Se ha creado un Curso';
      return back()->with(compact('status'));
    }
    // public function index(){
    //     $cursos = Docente_curso::where('estado','Activo')->get();
    //     return view('cursos.index', compact('cursos'));

    // }
    // public function edit(Docente_curso $docente_curso){
    //     $grados = Docente_curso::where('estado','Activo')->get();
    //     return view('cursos.edit', compact('curso','grados'));

    // }
    // public function update(Request $request,Docente_curso $docente_curso){
    //   $curso->estado = "Activo";
    //   $curso->curso = $request->curso;
    //   $curso->salon = $request->salon;
    //   $curso->grado = $request->grado;
    //   $curso->save();
    //   $status = 'Se ha actualizado un Curso';
    //   return back()->with(compact('status'));
    // }
    public function miscursos(){
      $cursos = Docente_curso::where('docente',Auth::user()->id )->get();
      return view('docentecurso.miscursos', compact('cursos'));
    }
    public function crearplantillas(Request $request){
        return $request->all();
    }
}

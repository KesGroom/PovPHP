<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente_curso;
use App\Models\Estudiante;
use App\Models\Grado;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function miscursos(){
      $id =  Auth::user()->id;
      $cursos = Docente_curso::where('docente', Auth::user()->id)->get();
      return view('cursos.miscursos', compact('cursos','id'));
      }
    public function asistencia(Request $request){
           $estudiantes = Estudiante::where('curso', $request->curso)->get();
           $docente_curso = $request->docente_curso;
           $periodos = Periodo::all();
           return view('cursos.verestudiantes',compact('estudiantes' ,'periodos','docente_curso'));
    }
    
   



    public function getCourses($id)
    {
      return Curso::where([['estado', 'Activo'], ['grado', $id]])->select('id', 'curso', 'salon')->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Docente_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteCursoController extends Controller
{
  public function create()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Docentes');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      return view('docentecurso.create', compact('rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function store(Request $request)
  {
    $curso = new Docente_curso();
    $curso->estado = "Activo";
    $curso->curso = $request->curso;
    $curso->salon = $request->salon;
    $curso->grado = $request->grado;
    $curso->save();
    $status = 'SwalCreate';
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
  public function miscursos()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Registros académicos');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $cursos = Docente_curso::where('docente', Auth::user()->id)->get();
      return view('docentecurso.miscursos', compact('cursos', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function crearplantillas(Request $request)
  {
    return $request->all();
  }
}

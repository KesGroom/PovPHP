<?php

namespace App\Http\Controllers;

use App\Models\Atencion_curso;
use App\Models\Docente_curso;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtencionCursoController extends Controller
{
  public function create()
  {
    $docente = DB::table('docente_curso')
      ->join('users', 'docente_curso.docente', '=', 'users.id')
      ->select('users.id', 'users.name', 'users.apellido')
      ->groupBy('users.id', 'users.name', 'users.apellido')
      ->get();
    return view('pages.atencion_curso.create', compact('docente'));
  }
  public function DocenteCurso(Request $request)
  {
    $docenteArea = DB::table('docente_curso')
      ->join('cursos', 'cursos.id', '=', 'docente_curso.curso')
      ->select('cursos.id', 'cursos.curso')
      ->where('docente_curso.docente', $request->docentes)
      ->groupBy('cursos.id', 'cursos.curso')
      ->get();
    return  response(json_encode($docenteArea), 200);
  }
  public function store(Request $request)
  {
    $Atencion_curso = new Atencion_curso();
    $Atencion_curso->estado = "Activo";
    $Atencion_curso->diaSemana = $request->diaSemana;
    $Atencion_curso->hora_inicio_atencion = $request->hora_inicio_atencion;
    $Atencion_curso->hora_final_atencion = $request->hora_final_atencion;
    $Atencion_curso->docente   = $request->docentes;
    $Atencion_curso->curso  = $request->Area;
    $Atencion_curso->save();
    $status = 'SwalCreate';
    return back()->with(compact('status'));
  }
  public function index()
  {
    $AtencionCurso =  Atencion_curso::where('estado', 'Activo')
      ->get();
    return View('pages.atencion_curso.index', compact('AtencionCurso'));
  }
  public function edit(Atencion_curso $ac)
  {
    $docente = DB::table('docente_curso')
      ->join('users', 'docente_curso.docente', '=', 'users.id')
      ->select('users.id', 'users.name', 'users.apellido')
      ->groupBy('users.id', 'users.name', 'users.apellido')
      ->get();
    return view('pages.atencion_curso.edit', compact('ac', 'docente'));
  }
  public function update(Request $request, Atencion_curso $ac)
  {

    $ac->diaSemana = $request->diaSemana;
    $ac->hora_inicio_atencion = $request->hora_inicio_atencion;
    $ac->hora_final_atencion = $request->hora_final_atencion;
    $ac->docente   = $request->docentes;
    $ac->curso  = $request->Area;
    $ac->save();
    $status = 'SwalUpdate';
    return back()->with(compact('status'));
  }
}

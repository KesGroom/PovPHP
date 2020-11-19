<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Registro_nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroNotaController extends Controller
{
  // public function __construct()
  //   {
  //       $this->middleware('auth');

  //       $this->middleware('log')->only('index');

  //   }
    public function index(Request $request){
     
      $estudiantes = Estudiante::where([
        ['estado', '=', "Activo"],
        ['curso', '=', $request->curso],
    ])->get();
    return view('notas.index', compact('estudiantes'));
    }
    public function create(Request $request){
      $docente_curso = $request->docente_curso;
      $curso = $request->tc;
      $actividad = $request->id;
      $estudiantes = Estudiante::where([
        ['estado', '=', "Activo"],
        ['curso', '=', $request->tc],
    ])->get();
    $periodos = Periodo::where([
      ['estado', '=', "Activo"],
  ])->get();
      return view('notas.create', compact('docente_curso','estudiantes','periodos','curso','actividad'));
    }


    public function store(Request $request){
      $estudiantes = Estudiante::where([
        ['estado', '=', "Activo"],
        ['curso', '=', $request->curso],
    ])->get();

        foreach ($estudiantes as $valor) {
            $lol = $valor->id;
            $o = $lol;
            $A = "A";
            $pepe = $A.$o;
            $h = $valor->id;
            $z = $h;
            $t = "B";
           
            $calificacion = $t.$o;
            $registroN = new Registro_nota();
            $registroN->estado = "Activo";
            $registroN->calificacion= $request->$pepe;
            $registroN->fecha_entrega= $request->fecha_entrega;
            $registroN->actividad = $request->actividad;
            $registroN->periodo = $request->periodo;
            $registroN->estudiante= $request->$lol;
            $registroN->save();
        }
    }

    public function minotas(){
      $id = Auth::user()->id;
      $estudiantes = Estudiante::where([
          ['estado', '=', "Activo"],
          ['acudiente', '=', $id],
      ])->get();
      return view('notas.misnotas' , compact('estudiantes','id'));
    }
    public function notasEA(Request $request){
      $nota = Registro_nota::where([
          ['estado', '=', "Activo"],
          ['estudiante', '=', $request->id],
      ])->get();
      return view('notas.notasEA', compact('nota'));
  }
}

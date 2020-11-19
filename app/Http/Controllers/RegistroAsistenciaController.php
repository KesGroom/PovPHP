<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Pqrs;
use App\Models\Registro_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class RegistroAsistenciaController extends Controller
{
   
      
    public function store(Request $request){
        $estudiantes = Estudiante::where('curso', $request->curso)->get();
        foreach ($estudiantes as $valor) {
            $lol = $valor->id;
            $o = $lol;
            $A = "A";
            $pepe = $A.$o;
            $h = $valor->id;
            $z = $h;
            $t = "B";
           
            $observacion = $A.$o;
            $registroA = new Registro_asistencia();
            $registroA->estado = "Activo";
            $registroA->tema_trabajado= $request->tema_trabajado;
            $registroA->asistencia= $request->$pepe;
            $registroA->observaciones =  $request->$observacion;
            $registroA->estudiante= $request->$lol;
            $registroA->periodo = $request->periodo;
            $registroA->docente_curso = $request->docente_curso;
            $registroA->save();
        }
     
    }
    public function index(Request $request){
        $valiable = $request->docente_curso;
         $estudiantes = Estudiante::where('curso', $request->curso)->get();
         return view('asistencias.index', compact('estudiantes','valiable'));
    }
    public function asistenciasEstudiante(Request $request){
        $registroAsitencia = DB::table('registro_asistencia')->where([
            ['estudiante', '=', $request->estudiante],
            ['docente_curso', '=', $request->docente_curso],
        ])->get();
        return view('asistencias.asistenciasEstudiante', compact('registroAsitencia'));
    }
    public function edit(Registro_asistencia $estudiante){
        return view('asistencias.edit', compact('estudiante'));

    }
    public function update(Request $request,Registro_asistencia $estudiante){
        $estudiante->tema_trabajado= $request->tema_trabajado;
        $estudiante->asistencia= $request->asistencia;
        $estudiante->observaciones =  $request->observacion;
        $estudiante->save();
        $status = 'Se ha actualizado la asistencia';
        return back()->with(compact('status'));
    }

    // Consultas para usuarios Estudiante y Acudiente


    public function miAsistencia(){
        $id = Auth::user()->id;
        $estudiantes = Estudiante::where([
            ['estado', '=', "Activo"],
            ['acudiente', '=', $id],
        ])->get();
        return view('asistencias.misasistencias' , compact('estudiantes','id'));
    }
    public function AsistenciaEA(Request $request){
        $asitencia = Registro_asistencia::where([
            ['estado', '=', "Activo"],
            ['estudiante', '=', $request->id],
        ])->get();
        return view('asistencias.AsistenciaEA', compact('asitencia'));
    }

}
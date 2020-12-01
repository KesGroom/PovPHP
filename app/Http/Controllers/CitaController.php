<?php

namespace App\Http\Controllers;

use App\Models\Atencion_area;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function crearCita(){
      $atencion_area = Atencion_area::where('estado','Activo')->get();
       return view('citas.createCita', compact('atencion_area'));
    }
    public function storeArea(Request $request){
      $cita = new Cita();
      $cita->estado = "Activo";
      $cita->fecha_cita = $request->hora;
      $cita->atencion_area = $request->atencion_area;
      $cita->save();
    }
    public function index(){
      return view('citas.index');
      
    }
    public function solitarCita(){
      $citas_area = DB::table('citas')
      ->where('acudiente',null)
            ->join('atencion_area', 'atencion_area.id', '=', 'citas.atencion_area')
            ->join('users', 'users.id', '=', 'atencion_area.docente')
            ->select('atencion_area.hora_inicio_atencion','atencion_area.hora_final_atencion','atencion_area.diaSemana','users.name','users.apellido','citas.id')
            ->get();
      // $citas_area = DB::table('citas')
      // ->where('estado','Activo')
      // ->select('fecha_cita','atencion_area')
      // ->get();
      // $citas_curso = Cita::where('estado','Activo')
      // ->select('fecha_cita','atencion_curso')
      // ->get();
      return view('citas.solicitar', compact('citas_area'));
    }
    public function asuntoCita(Request $request){
      $id_cita = $request->id_cita;
      return view('citas.asunto',compact('id_cita'));
    }
    public function AgendarCita(Request $request){
      //Dede haber iniciado sesion con el acudiente 
      $agendar = DB::table('citas')
      ->where('id', $request->id_cita)
      ->update(['acudiente' => auth()->id()]);
      $status = 'Se ha respondido  el pqrs';
      // Consulta bd
      $citas_area = DB::table('citas')
      ->where('acudiente',null)
            ->join('atencion_area', 'atencion_area.id', '=', 'citas.atencion_area')
            ->join('users', 'users.id', '=', 'atencion_area.docente')
            ->select('atencion_area.hora_inicio_atencion','atencion_area.hora_final_atencion','atencion_area.diaSemana','users.name','users.apellido','citas.id')
            ->get();
      return view('citas.solicitar', compact('citas_area','status'));
    }
    public function reiniciarCitas(Request $request){
      $affected = DB::table('citas')
       ->update(
        ['acudiente' => NULL]
    );
      return response(json_encode($affected),200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Atencion_area;
use App\Models\Atencion_curso;
use App\Models\Cita;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function crearCita(){
      $atencion_area = Atencion_area::where('estado','Activo')->get();
      $atencion_curso = Atencion_curso::where('estado','Activo')->get();
       return view('citas.createCita', compact('atencion_area','atencion_curso'));
    }
    public function storeArea(Request $request){
     if ($request->tipo_atencion == 1) {
      $atecionStatus = 'Debe seleccionar Tipo de atencion';
      return back()->with(compact('atecionStatus'));
     }
     if ($request->tipo_atencion == 2) {
      $cita = new Cita();
      $cita->estado = "Activo";
      $cita->fecha_cita = $request->hora;
      $cita->atencion_area = $request->atencion_area;
      $cita->save();
      $status = 'se ha registrado Tipo de atencion';
      return back()->with(compact('status'));
     }
     if ($request->tipo_atencion == 3) {
      $cita = new Cita();
      $cita->estado = "Activo";
      $cita->fecha_cita = $request->hora;
      $cita->atencion_curso  = $request->atencion_curso ;
      $cita->save();
      $status = 'se ha registrado Tipo de atencion';
      return back()->with(compact('status'));
     }
    
    }
    public function index(){
      $citasArea = Cita::where([
    ['estado', '=', 'Activo'],
    ['atencion_curso', '=', null],
])->get();
      return view('citas.index', compact('citasArea'));
      
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
      $agendarAcudiente = DB::table('citas')
      ->where('id', $request->id_cita)
      ->update(
        ['acudiente' => auth()->id()]
      );
      $agendarAsunto = DB::table('citas')
      ->where('id', $request->id_cita)
      ->update(
        ['asunto' => $request->asunto]
      );
     
      // Consulta bd
      $citas_area = DB::table('citas')
      ->where('acudiente',null)
            ->join('atencion_area', 'atencion_area.id', '=', 'citas.atencion_area')
            ->join('users', 'users.id', '=', 'atencion_area.docente')
            ->select('atencion_area.hora_inicio_atencion','atencion_area.hora_final_atencion','atencion_area.diaSemana','users.name','users.apellido','citas.id')
            ->get();
      return view('citas.solicitar', compact('citas_area'));
    }
    public function reiniciarCitas(Request $request){
      $affected = DB::table('citas')
       ->update(
        ['acudiente' => NULL]
    );
      return response(json_encode($affected),200);
    }
    //Se necesita inicio session por parte del acudiente
    public function miscitas(){
      $citas = Cita::where([
        ['acudiente',Auth::user()->id],
        ['estado', '=', 'Activo'],
    ])->get();
       return view('citas.miscitas', compact('citas'));
    }
    
}

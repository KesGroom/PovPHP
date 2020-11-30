<?php

namespace App\Http\Controllers;

use App\Models\Atencion_area;
use App\Models\Cita;
use Illuminate\Http\Request;

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
      $citas_area = Cita::where('estado','Activo')
      ->select('fecha_cita','atencion_area')
      ->get();
      $citas_area = Cita::where('estado','Activo')
      ->select('fecha_cita','atencion_curso')
      ->get();
      return view('citas.solicitar', compact('citas_area','citas_area'));
    }
}

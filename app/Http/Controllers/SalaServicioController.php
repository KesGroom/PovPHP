<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Sala_servicio;
use App\Models\Zona_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaServicioController extends Controller
{
    public function index(){
        $salas = Sala_servicio::where([['estado','Activo'],['estado_servicio', 'En espera']])->get();
        return view('sala.index', compact('salas'));
    }
 
 

    public function store(Zona_servicio $zona){
        $sala = new Sala_servicio();
        $sala->estado = "Activo";
        $sala->estado_servicio = "En espera";
        $sala->estudiante  = Auth::user()->id;
        $sala->zona_servicio = $zona->id;  
        $sala->save();
        $status = 'Se ha postulado correctamente';
        return back()->with(compact('status'));
      }
      public function rechazar(Sala_servicio $salas){
        $salas->estado_servicio = "Rechazado";
        $salas->save();   
        $status = 'Estudiante rechazado';
        return back()->with(compact('status'));
      }

      public function aceptar(Sala_servicio $salas){
        $salas->estado_servicio = "Aceptado";
        $salas->save();  
        $status = 'Estudiante rechazado';
        return back()->with(compact('status'));
      }
}

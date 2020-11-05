<?php

namespace App\Http\Controllers;

use App\Models\Sala_servicio;
use Illuminate\Http\Request;

class SalaServicioController extends Controller
{
    public function index(){
        $sala = Sala_servicio::where('estado','Activo')->get();
        return view('sala.index', compact('sala'));
    }

    public function store(Request $request){
        $sala = new Sala_servicio();
        $sala->estado = "Activo";
        $sala->estado_servicio = "En espera";
        $sala->estudiante  = $request->estudiante ;
        $sala->zona_servicio = $request->zona_servicio;  
        $status = 'Se ha postulado correctamente';
        return back()->with(compact('status'));
      }
}

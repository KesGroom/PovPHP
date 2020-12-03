<?php

namespace App\Http\Controllers;

use App\Models\Bitacora_servicio;
use App\Models\Sala_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitacoraServicioController extends Controller
{
    
    public function create(Sala_servicio $sala){
        
        return view('bitacora.create',compact('sala'));

    }

    public function index(){
        $salas = Sala_servicio::where([['estado', 'Activo'],['estado_servicio', 'Aceptado']])->get();
        $bi = Bitacora_servicio::where('estado','Activo')->orderBy('created_at', 'desc')->get()->take(15);
        return view('bitacora.index', compact('bi','salas'));

    }
    public function edit(Bitacora_servicio $bita){
        $bi = Bitacora_servicio::where('estado','Activo')->get();
        return view('bitacora.edit', compact('bita'));

    }
    public function store(Request $request,Sala_servicio $sala){
        $bi = new Bitacora_servicio();
        $bi->estado = "Activo";
        $bi->tiempo_prestado = $request->tiempo_prestado;
        $bi->observaciones = $request->observaciones;
        $bi->cantidad_labores = $request->cantidad_labores;
        $bi->coordinador = Auth::user()->id;
        $bi->sala_servicio = $sala->id;
        $bi->save();
        $status = 'Se ha creado una bitacora de servicio social';
        return back()->with(compact('status'));
      }
    
      public function update(Request $request,Bitacora_servicio $bita){
        $bita->estado = "Activo";
        $bita->tiempo_prestado = $request->tiempo_prestado;
        $bita->observaciones = $request->observaciones;
        $bita->cantidad_labores = $request->cantidad_labores;
        $bita->coordinador = Auth::user()->id;
      
        $bita->save();
        $status = 'Se ha actualizado la bitacora de servicio social con exito';
        return back()->with(compact('status'));
      }
}

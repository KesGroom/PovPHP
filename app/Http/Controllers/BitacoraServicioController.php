<?php

namespace App\Http\Controllers;

use App\Models\Bitacora_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitacoraServicioController extends Controller
{
    public function create(){
        $bi = Bitacora_servicio::where('estado','Activo')->get();
        return view('bitacora.create', compact('bi'));

    }
    public function index(){
        $bi = Bitacora_servicio::where('estado','Activo')->get();
        return view('bitacora.index', compact('bi'));

    }
    public function edit(Bitacora_servicio $bita){
        $bi = Bitacora_servicio::where('estado','Activo')->get();
        return view('bitacora.edit', compact('bita'));

    }
    public function store(Request $request){
        $bi = new Bitacora_servicio();
        $bi->estado = "Activo";
        $bi->tiempo_prestado = $request->tiempo_prestado;
        $bi->observaciones = $request->observaciones;
        $bi->cantidad_labores = $request->cantidad_labores;
        $bi->coordinador = Auth::user()->id;
        $bi->sala_servicio = $request->sala_servicio;
        $bi->save();
        $status = 'Se ha creado una bitacora de servicio social';
        return back()->with(compact('status'));
      }
    
      public function update(Request $request,Bitacora_servicio $bita){
        $bita->estado = "Activo";
        $bita->tiempo_prestado = $request->tiempo_prestado;
        $bita->observaciones = $request->observaciones;
        $bita->cantidad_labores = $request->cantidad_labores;
        $bita->coordinador = $request->coordinador;
        $bita->sala_servicio = $request->sala_servicio;
        $bita->save();
        $status = 'Se ha creado una bitacora de servicio social';
        return back()->with(compact('status'));
      }
}

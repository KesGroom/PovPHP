<?php

namespace App\Http\Controllers;

use App\Models\Zona_servicio;
use Illuminate\Http\Request;

class ServicioSocialController extends Controller
{
    public function create(){
        $zonas = Zona_servicio::where('estado','Activo')->get();
        return view('zonas.create', compact('zonas'));

    }
    public function index(){
        $zonas = Zona_servicio::where('estado','Activo')->get();
        return view('zonas.index', compact('zonas'));

    }
    public function edit(Zona_servicio $zona){
        $zonas = Zona_servicio::where('estado','Activo')->get();
        return view('zonas.edit', compact('zona'));

    }
    public function store(Request $request){
        $zonas = new Zona_servicio();
        $zonas->estado = "Activo";
        $zonas->nombre_zona = $request->nombre_zona;
        $zonas->lugar = $request->lugar;
        $zonas->encargado = $request->encargado;
        $zonas->hora_entrada = $request->hora_entrada;
        $zonas->hora_salida = $request->hora_salida;
        $zonas->tiempo_servicio = $request->tiempo_servicio;
        $zonas->cupos = $request->cupos;
        $zonas->labores = $request->labores;
        $zonas->dias_servicio = $request->dias_servicio;
        $zonas->save();
        $status = 'Se ha creado una zona de servicio social';
        return back()->with(compact('status'));
      }
    
      public function update(Request $request,Zona_servicio $zona){
        $zona->estado = "Activo";
        $zona->nombre_zona = $request->nombre_zona;
        $zona->lugar = $request->lugar;
        $zona->encargado = $request->encargado;
        $zona->hora_entrada = $request->hora_entrada;
        $zona->hora_salida = $request->hora_salida;
        $zona->tiempo_servicio = $request->tiempo_servicio;
        $zona->cupos = $request->cupos;
        $zona->labores = $request->labores;
        $zona->dias_servicio = $request->dias_servicio;
        $zona->save();
        $status = 'Se ha actualizado una zona de servicio social';
        return back()->with(compact('status'));
      }
}

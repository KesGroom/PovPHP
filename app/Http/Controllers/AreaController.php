<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function create(){
        return view('areas.create');

    }
    public function store(Request $request){
      $area = new Area();
      $area->estado = "Activo";
      $area->nombre_area = $request->nombre_area;
      $area->save();
      $status = 'Se ha creado un Area';
      return back()->with(compact('status'));
    }
    public function index(){
        $areas = Area::where('estado','Activo')->get();
        return view('areas.index', compact('areas'));

    }
    public function edit(Area $area){
        return view('areas.edit', compact('area'));

    }
    public function update(Request $request,Area $area){
        $area->estado = "Activo";
        $area->nombre_area = $request->nombre_area;
        $area->save();
        $status = 'Se ha actualizado el Area';
        return back()->with(compact('status'));
    }
}

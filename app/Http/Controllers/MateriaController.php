<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function create(){
        $areas = Area::where('estado',"Activo")->get();
        return view('materias.create' , compact('areas'));
    }
    public function store(Request $request){
        $validatedData =$request->validate([
            'nombre_materia' => 'required|min:3|max:80'
      ]);
      $materia = new Materia();
      $materia->estado = "Activo";
      $materia->nombre_materia = $request->nombre_materia;
      $materia->area = $request->area;
      $materia->save();
      $status = 'Se ha creado una materia';
      return back()->with(compact('status'));
    }
    public function index(){
        $materias = Materia::where('estado',"Activo")->get();
        return view('materias.index' , compact('materias'));
    }
    public function edit(Materia $materias){
        $areas = Area::where('estado',"Activo")->get();
        return view('materias.edit' , compact('materias','areas'));
    }
    public function update(Request $request,Materia $materias){
        $validatedData =$request->validate([
            'nombre_materia' => 'required|min:3|max:80'
      ]);
      $materias->nombre_materia = $request->nombre_materia;
      $materias->area = $request->area;
      $materias->save();
      $status = 'Se ha actualizado una materia';
      return back()->with(compact('status'));
    }
    public function all(Request $request){
        $materias = Materia::where('estado',"Activo")->get();
        return response(json_encode($materias),200);
    }
}

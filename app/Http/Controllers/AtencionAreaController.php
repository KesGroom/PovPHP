<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Atencion_area;
use App\Models\Docente_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AtencionAreaController extends Controller
{
    public function create(){
       $docente = Docente_curso::where('estado','Activo')->get();
       return view('atencion_areas.create', compact('docente'));
    }
    public function store(Request $request){
       
      $atencion_area = new Atencion_area();
      $atencion_area->estado = "Activo";
      $atencion_area->diaSemana = $request->diaSemana;
      $atencion_area->hora_inicio_atencion = $request->hora_inicio_atencion;
      $atencion_area->hora_final_atencion = $request->hora_final_atencion;
      $atencion_area->docente   = $request->docentes;
      $atencion_area->Area  = $request->Area;
      $atencion_area->save();
    //   $status = 'Se ha registrado un nuevo acudiente';
    //   return back()->with(compact('status'));
        
    }
    public function DocenteArea(Request $request){
        $docenteMateria = DB::table('docente_curso')
        ->select('id')
        // ->where('id',$request->docentes)
        ->get();
        $docenteArea = DB::table('docente_curso')
            ->join('materias', 'docente_curso.materia', '=', 'materias.id')
            ->join('areas', 'areas.id', '=', 'materias.area')
            ->select('areas.id','areas.nombre_area')
            ->where('docente_curso.docente',$request->docentes)
            ->groupBy('areas.id','areas.nombre_area')
            ->get();
        return  response(json_encode($docenteArea),200);
      }

}

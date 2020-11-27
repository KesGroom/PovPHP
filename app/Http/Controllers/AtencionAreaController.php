<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
 
        
    }
    public function DocenteArea(Request $request){
        $docenteMateria = DB::table('docente_curso')
        ->select('id')
        // ->where('id',$request->docentes)
        ->get();
        $docente = Docente_curso::where('estado','Activo')->get();
        return  response(json_encode($docenteMateria),200);
      }

}

<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PqrsController extends Controller
{
    public function create(){
        return view('pqrs.create');
    }


    public function store(Request $request){
        $pqrs = new Pqrs();
        $pqrs->estado = "Activo";
        $pqrs->asunto = $request->asunto;
        $pqrs->categoria = $request->categoria;
        $pqrs->acudiente = auth()->id();
        $pqrs->coordinador = 1000624349;
        $pqrs->save();
        $status = 'Se ha creado una nueva pqrs';
        return back()->with(compact('status'));
    }
    public function index(){
        $pqrs = Pqrs::where('estado','Activo')->get();
        $Pregunta = Pqrs::where('categoria','Pregunta')->get();
        $Queja = Pqrs::where('categoria','Queja')->get();
        $Reclamo = Pqrs::where('categoria','Reclamo')->get();
        $Sugerencia = Pqrs::where('categoria','Sugerencia')->get();
        return view('pqrs.index' , compact('pqrs','Pregunta','Queja','Reclamo','Sugerencia'));
    }
    public function responder(Pqrs $pqrs){
        return view('pqrs.responder', compact('pqrs'));

    }
    public function update(Request $request,Pqrs $pqrs){
        $pqrs->respuesta = $request->respuesta;
        $pqrs->save();
        $status = 'Se ha respondido  el pqrs';
        return back()->with(compact('status'));
    }

    //CONSULTA MYSQL SELECT COUNT(id) , p.categoria from pqrs p WHERE respuesta IS  NULL GROUP BY categoria
    public function graficar(){
        $pqrs = DB::table('pqrs')
        ->select('categoria',DB::raw('count(*) as total'))
        ->whereNull('respuesta')
        ->groupBy('categoria')
        ->get();
        return response(json_encode($pqrs),200);
}
   public function vergrafica(){
       return view('graficas.pqrs');
   }
}

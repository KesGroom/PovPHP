<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PqrsController extends Controller
{
    public function create()
    {
        if (!Auth::user()) {return WelcomeController::welcome();}
        $validated= PermisoController::validatedPermit('Mis PQRS');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            $myPQRS = Pqrs::where([['estado', 'Activo'], ['acudiente', Auth::user()->id]])->paginate('10');
            return view('pages.pqrs.create', compact('rhp', 'myPQRS'));
        } else {return WelcomeController::welcome();}
    }

    public function delete(Pqrs $pqrs)
    {
      $pqrs->estado = 'Inactivo';
      $pqrs->save();
  
      $myPQRS = Pqrs::where([['estado', 'Activo'], ['acudiente', Auth::user()->id]])->paginate('10');
      $rhp = RolHasPermisoController::rhp();
      $status = 'SwalDelete';
      return back()->with(compact('myPQRS', 'rhp', 'status'));
    }

    public function store(Request $request)
    {
        $pqrs = new Pqrs();
        $pqrs->estado = "Activo";
        $pqrs->asunto = $request->asunto;
        $pqrs->categoria = $request->categoria;
        $pqrs->acudiente = Auth::user()->id;
        $pqrs->coordinador = null;
        $pqrs->save();
        $status = 'Se ha creado una nueva pqrs';
        return back()->with(compact('status'));
    }

    public function index()
    {
        if (!Auth::user()) {return WelcomeController::welcome();}
        $validated= PermisoController::validatedPermit('Lista de PQRS');
        if ($validated) {     
            $rhp = RolHasPermisoController::rhp();
            //Consulta y contador de todos los pqrs
            $pqrs = Pqrs::where('estado', 'Activo')->get();
            $ctAll = Pqrs::where([['estado', 'Activo'], ['respuesta', null]])->count();
            //Consulta propia por categoria
            $Pregunta = Pqrs::where([['estado' ,'Activo'],['categoria', 'Pregunta']])->get();
            $Queja = Pqrs::where([['estado' ,'Activo'],['categoria', 'Queja']])->get();
            $Reclamo = Pqrs::where([['estado' ,'Activo'],['categoria', 'Reclamo']])->get();
            $Sugerencia = Pqrs::where([['estado' ,'Activo'],['categoria', 'Sugerencia']])->get();

            //Contadores por categoria
            $ctPregunta = Pqrs::where([['estado', 'Activo'], ['respuesta', null], ['categoria','Pregunta']])->count();
            $ctQueja = Pqrs::where([['estado', 'Activo'], ['respuesta', null], ['categoria','Queja']])->count();
            $ctReclamo = Pqrs::where([['estado', 'Activo'], ['respuesta', null], ['categoria','Reclamo']])->count();
            $ctSugerencia = Pqrs::where([['estado', 'Activo'], ['respuesta', null], ['categoria','Sugerencia']])->count();
            return view('pages.pqrs.index', compact('pqrs', 'Pregunta', 'Queja', 'Reclamo', 'Sugerencia', 'rhp', 'ctAll', 'ctPregunta', 'ctSugerencia', 'ctQueja', 'ctReclamo'));
        } else {return WelcomeController::welcome();}
    }

    public function responder(Pqrs $pqrs)
    {
        if (!Auth::user()) {return WelcomeController::welcome();}
        $validated= PermisoController::validatedPermit('Lista de PQRS');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.pqrs.responder', compact('pqrs', 'rhp'));
        } else {return WelcomeController::welcome();}
    }

    public function update(Request $request, Pqrs $pqrs)
    {
        $pqrs->respuesta = $request->respuesta;
        $pqrs->coordinador = Auth::user()->id;
        $pqrs->save();
        $status = 'Se ha respondido  el pqrs';
        return back()->with(compact('status'));
    }

    //CONSULTA MYSQL SELECT COUNT(id) , p.categoria from pqrs p WHERE respuesta IS  NULL GROUP BY categoria
    public function graficar()
    {
        $pqrs = DB::table('pqrs')
            ->select('categoria', DB::raw('count(*) as total'))
            ->whereNull('respuesta')
            ->groupBy('categoria')
            ->get();
        return response(json_encode($pqrs), 200);
    }

    public function vergrafica()
    {
        return view('graficas.pqrs');
    }
}

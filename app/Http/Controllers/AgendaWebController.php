<?php

namespace App\Http\Controllers;

use App\Models\Agenda_web;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaWebController extends Controller
{
    public function create(Request $request)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Agenda web');
        $estudiante = Estudiante::where([
            ['estado', "=", 'Activo'],
            ['curso', "=", $request->tc]
        ])->get();
        $tc = $request->tc;
        $docente_curso = $request->docente_curso;
        return view('pages.AgendaWeb.create', compact('estudiante', 'tc', 'docente_curso', 'rhp'));
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
        } else {
            return WelcomeController::welcome();
        }
    }
    public function store(Request $request)
    {
        $estudiante = Estudiante::where([
            ['estado', "=", 'Activo'],
            ['curso', "=", $request->tc]
        ])->get();
        foreach ($estudiante as $valor) {
            $lol = $valor->id;
            $o = $lol;
            $A = "A";
            $pepe = $A . $o;
            $h = $valor->id;
            $z = $h;
            $t = "B";

            $descrip = $t . $o;
            $agennda = new Agenda_web();
            $agennda->estado = "Activo";
            $agennda->categoria = $request->$pepe;
            $agennda->descripcion = $request->$descrip;
            $agennda->docente_curso = $request->docente_curso;
            $agennda->save();
        }
    }
    public function delete(Agenda_web $agenda)
    {
        $agenda->estado = 'Inactivo';
        $agenda->save();
        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }
}

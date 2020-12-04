<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Sala_servicio;
use App\Models\Zona_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaServicioController extends Controller
{
  public function index()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Servicio social');
    if ($validated) {
      if (Auth::user()->rol != 3) {
        $rhp = RolHasPermisoController::rhp();
        $salas = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'En espera']])->get();
        return view('pages.sala.index', compact('salas', 'rhp'));
      } else {
        return WelcomeController::welcome();
      }
    } else {
      return WelcomeController::welcome();
    }
  }

  public function store(Zona_servicio $zona)
  {
    $sala = new Sala_servicio();
    $sala->estado = "Activo";
    $sala->estado_servicio = "En espera";
    $sala->estudiante  = Auth::user()->id;
    $sala->zona_servicio = $zona->id;
    $sala->tiempo_servicio = 0;
    $sala->save();

    $newCupos = $zona->cupos - 1;
    $zona->cupos = $newCupos;
    $zona->save();

    $status = 'SwalPostulation';
    return back()->with(compact('status'));
  }

  public function rechazar(Sala_servicio $salas)
  {
    $salas->estado_servicio = "Rechazado";
    $salas->save();

    $zona = Zona_servicio::where('id', $salas->zona_servicio)->first();
    $newCupos = $zona->cupos + 1;
    $zona->cupos = $newCupos;
    $zona->save();

    $status = 'SwalRejected';
    return back()->with(compact('status'));
  }

  public function aceptar(Sala_servicio $salas)
  {
    $salas->estado_servicio = "Aceptado";
    $salas->save();

    $estudiante = Estudiante::where('id', $salas->estudiante)->first();
    $estudiante->estado_servicio_social = 'En servicio';
    $estudiante->save();

    $status = 'SwalAccept';
    return back()->with(compact('status'));
  }
}

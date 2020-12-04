<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Sala_servicio;
use App\Models\Zona_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZonaServicioController extends Controller
{
    public function create()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio social');
        if ($validated) {
            if (Auth::user()->rol != 3) {
                $rhp = RolHasPermisoController::rhp();
                return view('pages.zonas.create', compact('rhp'));
            } else {
                return WelcomeController::welcome();
            }
        } else {
            return WelcomeController::welcome();
        }
    }

    public function index()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio social');
        $rhp = RolHasPermisoController::rhp();
        if ($validated) {
            if (Auth::user()->rol != 3) {
                $zonas = Zona_servicio::where('estado', 'Activo')
                    ->orWhere('estado', 'Bloqueado')->paginate('21');
                $postulation = 'false';
                return view('pages.zonas.index', compact('zonas', 'rhp', 'postulation'));
            } else {
                $PV = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'En espera'], ['estudiante', Auth::user()->id]])->first();
                if ($PV) {
                    $postulation = 'true';
                } else {
                    $postulation = 'false';
                    $EV = Estudiante::where('id', Auth::user()->id)->first();
                    if ($EV->estado_servicio_social == 'En servicio') {
                        $postulation = 'service';
                    }elseif($EV->estado_servicio_social == 'Completado'){
                        $postulation = 'finish';
                    }
                }
                $zonas = Zona_servicio::where([['estado', 'Activo'], ['cupos', '>', '0']])->paginate('21');
                return view('pages.zonas.index', compact('zonas', 'rhp', 'postulation', 'PV'));
            }
        } else {
            return WelcomeController::welcome();
        }
    }

    public function edit(Zona_servicio $zona)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio Social');
        if ($validated) {
            if (Auth::user()->rol != 3) {
                $rhp = RolHasPermisoController::rhp();
                return view('pages.zonas.edit', compact('zona', 'rhp'));
            } else {
                return WelcomeController::welcome();
            }
        } else {
            return WelcomeController::welcome();
        }
    }

    public function store(Request $request)
    {
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
        $status = 'SwalCreate';
        return back()->with(compact('status'));
    }

    public function update(Request $request, Zona_servicio $zona)
    {
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
        $status = 'SwalUpdate';
        return back()->with(compact('status'));
    }

    public function delete(Zona_servicio $zona)
    {
        $zona->estado = 'Inactivo';
        $zona->save();
        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }

    public function block(Zona_servicio $zona)
    {
        $zona->estado = 'Bloqueado';
        $zona->save();
        $status = 'SwalBlock';
        return back()->with(compact('status'));
    }
    public function unblock(Zona_servicio $zona)
    {
        $zona->estado = 'Activo';
        $zona->save();
        $status = 'SwalUnblock';
        return back()->with(compact('status'));
    }
}

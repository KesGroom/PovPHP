<?php

namespace App\Http\Controllers;

use App\Models\Bitacora_servicio;
use App\Models\Estudiante;
use App\Models\Sala_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BitacoraServicioController extends Controller
{

    public function create(Sala_servicio $sala)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio social');
        if ($validated) {
            if (Auth::user()->rol != 3) {
                $rhp = RolHasPermisoController::rhp();
                return view('pages.bitacora.create', compact('sala', 'rhp'));
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
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            if (Auth::user()->rol == 3) {
                $salas = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'Aceptado'], ['estudiante', Auth::user()->id]])->first();
                $estu = Estudiante::where('id', Auth::user()->id)->first();
                $sala = Sala_servicio::where([['estado', 'Activo'], ['estudiante', $estu->id]])->first();
                $bi = Bitacora_servicio::where([['estado', 'Activo'], ['sala_servicio', $sala->id]])->orderBy('created_at', 'desc')->get();
                $restante = 120 - $estu->tiempo_servicio;
                $horas = [
                    'prestado' => $estu->tiempo_servicio,
                    'restante' => $restante
                ];
                return view('pages.bitacora.index', compact('bi', 'salas', 'rhp', 'estu', 'horas'));
            } else {
                $salas = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'Aceptado']])->orderBy('tiempo_servicio', 'desc')->paginate('7');
                $bi = Bitacora_servicio::where([['estado', 'Activo']])->orderBy('created_at', 'desc')->get();
                return view('pages.bitacora.index', compact('bi', 'salas', 'rhp'));
            }
        } else {
            return WelcomeController::welcome();
        }
    }

    public function indexBit($id)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio social');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            if (Auth::user()->rol != 3) {
                $salas = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'Aceptado']])->orderBy('tiempo_servicio', 'desc')->paginate('7');
                $bi = Bitacora_servicio::where([['estado', 'Activo'], ['sala_servicio', $id]])->orderBy('created_at', 'desc')->get();
                return view('pages.bitacora.index', compact('bi', 'salas', 'rhp'));
            }
        } else {
            return WelcomeController::welcome();
        }
    }
    public function edit(Bitacora_servicio $bita)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Servicio social');
        if ($validated) {
            if (Auth::user()->rol != 3) {
                $rhp = RolHasPermisoController::rhp();
                $bi = Bitacora_servicio::where('estado', 'Activo')->get();
                return view('pages.bitacora.edit', compact('bita', 'rhp'));
            }
        } else {
            return WelcomeController::welcome();
        }
    }

    public function store(Request $request, Sala_servicio $sala)
    {
        $bi = new Bitacora_servicio();
        $bi->estado = "Activo";
        $bi->tiempo_prestado = $request->tiempo_prestado;
        $bi->observaciones = $request->observaciones;
        $bi->labores = $request->labores;
        $bi->coordinador = Auth::user()->id;
        $bi->sala_servicio = $sala->id;
        $bi->save();

        $newTime = $sala->tiempo_servicio + $request->tiempo_prestado;
        $sala->tiempo_servicio = $newTime;
        $sala->save();

        $status = 'SwalCreate';
        return back()->with(compact('status'));
    }

    public function update(Request $request, Bitacora_servicio $bita)
    {
        $oldTime = $bita->tiempo_prestado;

        $bita->estado = "Activo";
        $bita->tiempo_prestado = $request->tiempo_prestado;
        $bita->observaciones = $request->observaciones;
        $bita->labores = $request->labores;
        $bita->coordinador = Auth::user()->id;
        $bita->save();

        $sala = Sala_servicio::where('id', $bita->sala_servicio)->first();
        $newTime = ($sala->tiempo_servicio - $oldTime) + $request->tiempo_prestado;

        $sala->tiempo_servicio = $newTime;
        $sala->save();

        $status = 'SwalUpdate';
        return back()->with(compact('status'));
    }

    public function delete(Bitacora_servicio $bita)
    {
        $bita->estado = 'Inactivo';
        $bita->save();

        $sala = Sala_servicio::where('id', $bita->sala_servicio)->first();
        $newTime = $sala->tiempo_servicio - $bita->tiempo_prestado;

        $sala->tiempo_servicio = $newTime;
        $sala->save();

        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }
}

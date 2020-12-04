<?php

namespace App\Http\Controllers;

use App\Models\Bitacora_servicio;
use App\Models\Estudiante;
use App\Models\Sala_servicio;
use App\Models\User;
use App\Models\Zona_servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                $zona = Zona_servicio::where('id', $sala->zona_servicio)->first();
                $max = $zona->tiempo_servicio - $sala->tiempo_servicio;
                return view('pages.bitacora.create', compact('sala', 'rhp', 'max'));
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
                $bit = DB::table('bitacora_servicio')
                    ->join('sala_servicio', 'sala_servicio.id', '=', 'bitacora_servicio.sala_servicio')
                    ->join('users', 'users.id', '=', 'bitacora_servicio.coordinador')
                    ->join('zona_servicio', 'zona_servicio.id', '=', 'sala_servicio.zona_servicio')
                    ->select('bitacora_servicio.*', 'zona_servicio.nombre_zona', 'users.name', 'users.apellido')
                    ->where([['sala_servicio.estado', 'Activo'], ['bitacora_servicio.estado', 'Activo'], ['sala_servicio.estudiante', Auth::user()->id]])
                    ->orderBy('bitacora_servicio.created_at', 'desc')
                    ->get();
                $restante = 120 - $estu->tiempo_servicio;
                $horas = [
                    $estu->tiempo_servicio,
                    $restante
                ];
                return view('pages.bitacora.index', compact('bit', 'salas', 'rhp', 'estu', 'horas'));
            } else {
                $salas = Sala_servicio::where([['estado', 'Activo'], ['estado_servicio', 'Aceptado']])->orderBy('tiempo_servicio', 'desc')->paginate('7');
                $bi = DB::table('bitacora_servicio')
                ->where('estado', 'Activo')
                ->orderBy('created_at', 'desc')
                ->get();
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
        $estudiante = Estudiante::where('id', $sala->estudiante)->first();
        $timeVal = $estudiante->tiempo_servicio + $sala->tiempo_servicio;
        $zona = Zona_servicio::where('id', $sala->zona_servicio)->first();
        if ($sala->tiempo_servicio >= $zona->tiempo_servicio || $timeVal >= 120) {
            $zona->cupos = $zona->cupos + 1;
            $zona->save();
            $sala->estado_servicio = 'Terminado';
            if ($timeVal >= 120) {
                $timeVal = 120;
                $estudiante->tiempo_servicio = $timeVal;
                $estudiante->estado_servicio_social = 'Completado';
            } else {
                $estudiante->tiempo_servicio = $timeVal;
                $estudiante->estado_servicio_social = 'Disponible';
            }
            $estudiante->save();
        }
        
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

    public function certificado(User $user){
        if (!Auth::user()) {return WelcomeController::welcome();}
        $validated= PermisoController::validatedPermit('Servicio social');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.bitacora.certificado', compact('rhp', 'user')); 
        } else {return WelcomeController::welcome();}
    }
}

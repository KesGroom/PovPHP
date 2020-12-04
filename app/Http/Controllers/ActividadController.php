<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Docente_curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActividadController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Portafolio');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            // $
            // $Actividad = Actividad::where('docente_curso', )
            return view('Actividades.index', compact('Actividad', 'curso', 'tc', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }
    public function index2(Request $request)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Portafolio');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();

            $curso = $request->curso;
            $Actividad = DB::table('actividades')
                ->where('docente_curso', '=', $request->docente_curso)
                ->get();
            $tc  = DB::table('docente_curso')
                ->where('id', '=',  $request->docente_curso)
                ->first();
            return view('Actividades.index', compact('Actividad', 'curso', 'tc', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function create(Request $request)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Portafolio');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            $DC = DB::table('docente_curso')
                ->where('id', '=', $request->docente_curso)
                ->first();
            return view('Actividades.create', compact('DC', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:3|max:80',
            'identificador' => 'required|min:1|max:6',
            'descripcion' => 'required|max:100',
        ]);
        $actividad = new Actividad;
        $actividad->nombre = $validatedData['nombre'];
        $actividad->identificador = $validatedData['identificador'];
        $actividad->descripcion = $validatedData['descripcion'];
        $actividad->recursos = $request->recursos;
        $actividad->categoria = $request->categoria;
        $actividad->estado = "Activo";
        $actividad->docente_curso = $request->docente_curso;
        $actividad->save();
        $status = 'SwalCreate';
        return back()->with(compact('status'));

        //No funciona no se por que .-. el status 
    }
    public function edit(Actividad $actividad)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Portafolio');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('Actividades.edit', compact('actividad', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }
    public function update(Request $request, Actividad $actividad)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:3|max:80',
            'identificador' => 'required|min:1|max:6',
            'descripcion' => 'required|max:100',
        ]);
        $actividad->nombre = $validatedData['nombre'];
        $actividad->identificador = $validatedData['identificador'];
        $actividad->descripcion = $validatedData['descripcion'];
        $actividad->recursos = $request->recursos;
        $actividad->categoria = $request->categoria;
        $actividad->estado = "Activo";
        $actividad->docente_curso = $request->docente_curso;
        $actividad->save();
        $status = 'Se ha actualizado una actividad';
        return back()->with(compact('status'));
    }
    
    public function delete(Actividad $actividad)
    {
        $actividad->estado = 'Inactivo';
        $actividad->save();
        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Administración académica');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            //Listas
            $areas = Area::where('estado', 'Activo')->orderBy('nombre_area', 'asc')->paginate('6');
            $materias = Materia::where('estado', "Activo")->orderBy('nombre_materia', 'asc')->paginate('6');
            $grados = Grado::where('estado', "Activo")->orderBy('id', 'asc')->paginate('6');
            $cursos = Curso::where('estado', "Activo")->orderBy('id', 'asc')->paginate('6');
            //Listas para selects
            $cursosList = Curso::where('estado', "Activo")->orderBy('id', 'asc')->get();
            $gradosList = Grado::where('estado', "Activo")->orderBy('id', 'asc')->get();
            $areasList = Area::where('estado', 'Activo')->orderBy('nombre_area', 'asc')->get();
            //Contadores
            $ctAreas = Area::where('estado', 'Activo')->count();
            $ctMateria = Materia::where('estado', 'Activo')->count();
            $ctGrado = Grado::where('estado', 'Activo')->count();
            $ctCurso = Curso::where('estado', 'Activo')->count();
            return view('pages.administracion_academica.index', compact('areas', 'rhp', 'ctAreas', 'materias', 'ctMateria', 'grados', 'ctGrado', 'cursos', 'ctCurso', 'gradosList', 'areasList', 'cursosList'));
        } else {
            return WelcomeController::welcome();
        }
    }
    public function delete(Area $area)
    {
        $area->estado = 'Inactivo';
        $area->save();
        $areas = Area::where('estado', 'activo')->paginate('6');
        $rhp = RolHasPermisoController::rhp();
        $status = 'SwalDelete';
        return back()->with(compact('areas', 'rhp', 'status'));
    }

    public function create()
    {
        return view('pages.areas.create');
    }

    public function store(Request $request)
    {
        $area = new Area();
        $area->estado = "Activo";
        $area->nombre_area = $request->nombre_area;
        $area->save();
        $status = 'Se ha creado un Area';
        return back()->with(compact('status'));
    }
    public function edit(Area $area)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Administración académica');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.areas.edit', compact('area', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function update(Request $request, Area $area)
    {
        $area->estado = "Activo";
        $area->nombre_area = $request->nombre_area;
        $area->save();
        $status = 'SwalUpdate';
        return back()->with(compact('status'));
    }
}

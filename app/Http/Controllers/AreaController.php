<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {return WelcomeController::welcome();}
        $validated= PermisoController::validatedPermit('Administración académica');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            $areas = Area::where('estado', 'Activo')->get();
            return view('pages.areas.index', compact('areas', 'rhp'));
        } else {return WelcomeController::welcome();}
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
        return view('pages.areas.edit', compact('area'));
    }
    public function update(Request $request, Area $area)
    {
        $area->estado = "Activo";
        $area->nombre_area = $request->nombre_area;
        $area->save();
        $status = 'Se ha actualizado el Area';
        return back()->with(compact('status'));
    }
}

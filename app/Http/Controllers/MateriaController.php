<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_materia' => 'required|min:3|max:80'
        ]);
        $materia = new Materia();
        $materia->estado = "Activo";
        $materia->nombre_materia = $request->nombre_materia;
        $materia->area = $request->area;
        $materia->save();
        $status = 'SwalCreate';
        return back()->with(compact('status'));
    }

    public function edit(Materia $materias)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Administración académica');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            $areas = Area::where('estado', "Activo")->get();
            return view('pages.materias.edit', compact('materias', 'areas', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function update(Request $request, Materia $materias)
    {
        $validatedData = $request->validate([
            'nombre_materia' => 'required|min:3|max:80'
        ]);
        $materias->nombre_materia = $request->nombre_materia;
        $materias->area = $request->area;
        $materias->save();
        $status = 'SwalUpdate';
        return back()->with(compact('status'));
    }

    public function delete(Materia $materia)
    {
        $materia->estado = 'Inactivo';
        $materia->save();
        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }

    public function all(Request $request)
    {
        $materias = Materia::where('estado', "Activo")->get();
        return response(json_encode($materias), 200);
    }

    public function getMaterias($id)
    {
        return Materia::where([['estado', 'Activo'], ['area', $id]])->select('id', 'nombre_materia')->get();
    }
}

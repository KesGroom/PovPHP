<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradoController extends Controller
{

    public function store(Request $request)
    {
        $area = new Grado();
        $area->estado = "Activo";

        $area->nombre_grado = $request->nombre_grado;
        $area->nivel_educativo = $request->nivel_educativo;
        $area->save();
        $status = 'SwalCreate';
        return back()->with(compact('status'));
    }

    public function edit(Grado $grado)
    {
        if (!Auth::user()) {
            return WelcomeController::welcome();
        }
        $validated = PermisoController::validatedPermit('Administración académica');
        if ($validated) {
            $rhp = RolHasPermisoController::rhp();
            return view('pages.grados.edit', compact('grado', 'rhp'));
        } else {
            return WelcomeController::welcome();
        }
    }

    public function update(Request $request, Grado $grado)
    {
        $grado->estado = "Activo";
        $grado->nombre_grado = $request->nombre_grado;
        $grado->save();
        $status = 'SwalUpdate';
        return back()->with(compact('status'));
    }

    public function delete(Grado $grado)
    {
        $grado->estado = 'Inactivo';
        $grado->save();
        $status = 'SwalDelete';
        return back()->with(compact('status'));
    }

    public function getGrades($nivel)
    {
        return Grado::where([['estado', 'Activo'], ['nivel_educativo', $nivel]])->select('id', 'nombre_grado')->get();
    }
}

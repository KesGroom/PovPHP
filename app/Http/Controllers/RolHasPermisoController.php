<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol_has_permiso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RolHasPermisoController extends Controller
{
    public static function rhp()
    {
        $rol = Auth::user()->rol;
        $rhp = Rol_has_permiso::where('rol', $rol)->get();
        return $rhp;
    }
}

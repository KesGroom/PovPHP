<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Rol_has_permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermisoController extends Controller
{
    public static function validatedPermit($nombre)
    {
        $permiso = Permiso::where('nombre', $nombre)->first();
        $validated = Rol_has_permiso::where([['rol', Auth::user()->rol], ['permiso', $permiso->id]])->first();
        if (!$validated) {
            return false;
        } else {
            return true;
        }
    }
}

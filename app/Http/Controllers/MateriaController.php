<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function getMaterias($id)
    {
      return Materia::where([['estado', 'Activo'], ['area', $id]])->select('id', 'nombre_materia')->get();
    }
}

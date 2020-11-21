<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class graficasController extends Controller
{
    public function vergraficaUsuarios(){
        return view('graficas.usuariosVerGrafica');
    }
    // Consulta SELECT COUNT(id) , u.rol from users u  GROUP BY u.rol
    public function graficarUsuariosPorRol(){
        $userRol = DB::table('users')
        ->select('rol',DB::raw('count(*) as total'))
        ->groupBy('rol')
        // ->whereBetween('rol', [2, 5])
        ->get();
        return  response(json_encode($userRol),200);
}

// Consultar SELECT COUNT(id), MONTH(u.created_at) FROM users u GROUP BY DAYOFMONTH(u.created_at)
public function graficarUsuariosPorAño(){
    $userMes = DB::table('users')
    ->select('MONTH(u.created_at)',DB::raw('count(*) as total'))
    ->groupBy('DAYOFMONTH(u.created_at)')
    // ->whereBetween('rol', [2, 5])
    ->get();
    return  response(json_encode($userMes),200);
}
}

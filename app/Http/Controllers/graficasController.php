<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Cron\DayOfMonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class graficasController extends Controller
{

  ///
  ///
  ///// Graficas De usuarios (Vistas por el coordinador)
  ///
  ///
    public function vergraficaUsuarios(){
        return view('graficas.usuariosVerGrafica');
    }
    // Consulta SELECT COUNT(id) , u.rol from users u  GROUP BY u.rol
    public function graficarUsuariosPorRol(){
        $userRol = DB::table('users')
        ->select('rol',DB::raw('count(*) as total'))
        ->where('estado','Activo')
        ->groupBy('rol')
        // ->whereBetween('rol', [2, 5])
        ->get();
        return  response(json_encode($userRol),200);
}

// Consultar SELECT COUNT(id), MONTH(u.created_at) FROM users u GROUP BY DAYOFMONTH(u.created_at)
public function graficarUsuariosPorAño(){
    
    $res= User::where('estado','Activo')
      ->select(DB::raw('count(*) as total',DB::raw('MONTH(created_at) as month')))
      ->get()
      ->groupby(function($val) {
        return Carbon::parse($val->created_at)->format('m');
  });
      

    return  response(json_encode($res),200);
   
}
public function graficarGenero(){
  $userGenero = DB::table('users')
  ->select('genero',DB::raw('count(*) as total'))
  ->where('estado','Activo')
  ->groupBy('genero')
  ->get();
  return  response(json_encode($userGenero),200);
}
public function graficarEstudiantes(){
  $userEstudiante = DB::table('estudiantes')
  ->select('estado_servicio_social',DB::raw('count(*) as total'))
  ->where('estado','Activo')
  ->groupBy('estado_servicio_social')
  ->get();
  return  response(json_encode($userEstudiante),200);
}
/// Fin Graficas para usuario


  ///
  ///
  ///// Graficas De curso (Vistas por el coordinador)
  ///
  public function vergraficaCursos(){
    return view('graficas.cursosVerGrafica');
}
public function graficarCantidadEstudiantesCurso(){
  $userEstudiante = DB::table('estudiantes')
  ->join('cursos', 'cursos.id', '=', 'estudiantes.curso')
  ->select('cursos.curso',DB::raw('count(*) as total'))
  ->where('estudiantes.estado','Activo')
  ->groupBy('cursos.curso')
  ->get();
  return  response(json_encode($userEstudiante),200);
}
  /// Fin Graficas para Curso

  ///
  ///
  ///// Graficas De Asistencias todos los estudiantes (Vistas por el coordinador)
  public function vergraficaAsistenciaTodos(){
    return view('graficas.asistenticasVerGraficaTodos');
  }
  public function graficarCantidadEstudiantesAsistenciaHoy(){
    $asistenciaTodos = DB::table('registro_asistencia')
    ->select('asistencia',DB::raw('count(*) as total'))
    ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
    ->groupBy('asistencia')
    ->get();
    return  response(json_encode($asistenciaTodos),200);
  }

  ///


}

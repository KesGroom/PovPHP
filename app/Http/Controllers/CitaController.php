<?php

namespace App\Http\Controllers;

use App\Models\Atencion_area;
use App\Models\Atencion_curso;
use App\Models\Cita;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
  public function crearCita()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $atencion_area = Atencion_area::where('estado', 'Activo')->get();
      $atencion_curso = Atencion_curso::where('estado', 'Activo')->get();
      return view('pages.citas.createCita', compact('atencion_area', 'atencion_curso', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function storeArea(Request $request)
  {
    if ($request->tipo_atencion == 1) {
      $atecionStatus = 'Debe seleccionar Tipo de atencion';
      return back()->with(compact('atecionStatus'));
    }
    if ($request->tipo_atencion == 2) {
      $cita = new Cita();
      $cita->estado = "Activo";
      $cita->fecha_cita = $request->hora;
      $cita->atencion_area = $request->atencion_area;
      $cita->save();
      $status = 'se ha registrado Tipo de atencion';
      return back()->with(compact('status'));
    }
    if ($request->tipo_atencion == 3) {
      $cita = new Cita();
      $cita->estado = "Activo";
      $cita->fecha_cita = $request->hora;
      $cita->atencion_curso  = $request->atencion_curso;
      $cita->save();
      $status = 'se ha registrado Tipo de atencion';
      return back()->with(compact('status'));
    }
  }
  public function index()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $citasArea = Cita::where([
        ['estado', '=', 'Activo'],
        ['atencion_curso', '=', null],
      ])->get();
      return view('pages.citas.index', compact('citasArea', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function solitarCita()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $citas_area = DB::table('citas')
        ->where('acudiente', null)
        ->join('atencion_area', 'atencion_area.id', '=', 'citas.atencion_area')
        ->join('users', 'users.id', '=', 'atencion_area.docente')
        ->select('atencion_area.hora_inicio_atencion', 'atencion_area.hora_final_atencion', 'atencion_area.diaSemana', 'users.name', 'users.apellido', 'citas.id')
        ->get();

      return view('pages.citas.solicitar', compact('citas_area', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function asuntoCita(Request $request)
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $id_cita = $request->id_cita;
      return view('pages.citas.asunto', compact('id_cita', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function AgendarCita(Request $request)
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();

      //Dede haber iniciado sesion con el acudiente 
      $agendarAcudiente = DB::table('citas')
        ->where('id', $request->id_cita)
        ->update(
          ['acudiente' => auth()->id()]
        );
      $agendarAsunto = DB::table('citas')
        ->where('id', $request->id_cita)
        ->update(
          ['asunto' => $request->asunto]
        );

      // Consulta bd
      $citas_area = DB::table('citas')
        ->where('acudiente', null)
        ->join('atencion_area', 'atencion_area.id', '=', 'citas.atencion_area')
        ->join('users', 'users.id', '=', 'atencion_area.docente')
        ->select('atencion_area.hora_inicio_atencion', 'atencion_area.hora_final_atencion', 'atencion_area.diaSemana', 'users.name', 'users.apellido', 'citas.id')
        ->get();
      return view('pages.citas.solicitar', compact('citas_area', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }
  public function reiniciarCitas(Request $request)
  {
    $affected = DB::table('citas')
      ->update(
        ['acudiente' => NULL]
      );
    return response(json_encode($affected), 200);
  }
  //Se necesita inicio session por parte del acudiente
  public function miscitas()
  {
    if (!Auth::user()) {
      return WelcomeController::welcome();
    }
    $validated = PermisoController::validatedPermit('Citas');
    if ($validated) {
      $rhp = RolHasPermisoController::rhp();
      $citas = Cita::where([
        ['acudiente', Auth::user()->id],
        ['estado', '=', 'Activo'],
      ])->get();
      return view('pages.citas.miscitas', compact('citas', 'rhp'));
    } else {
      return WelcomeController::welcome();
    }
  }

  public function delete(Cita $cita)
  {
    $cita->estado = 'Inactivo';
    $cita->save();
    $status = 'SwalDelete';
    return back()->with(compact('status'));
  }
}

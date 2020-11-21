<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AtencionAreaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\graficasController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RegistroAsistenciaController;
use App\Http\Controllers\RegistroNotaController;
use App\Http\Controllers\UserController;
use App\Models\Atencion_area;
use App\Models\Docente_curso;
use App\Models\Registro_asistencia;
use App\Models\Registro_nota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Cloner\Cursor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    //Rutas para control del usuario de sesión
    Route::get('userPages/{usuario}/editProfile', [UserController::class, 'editProfile'])->name('editProfile');
    Route::put('userPages/changePhoto{usuarios}', [UserController::class, 'updatePhoto'])->name('userPages.updatePhoto');
    Route::put('userPages/changeInfo{usuario}', [UserController::class, 'updateInfo'])->name('userPages.updateInfo');
    Route::put('userPages/changePass{usuarioPass}', [UserController::class, 'updatePass'])->name('userPages.updatePass');
    
    //Routas para Acudiente
    Route::get('acudientes/create', [AcudienteController::class, 'create'])->name('acudientes.create');
    Route::post('acudientes', [AcudienteController::class, 'store'])->name('acudientes.store');
    Route::get('acudientes/index', [AcudienteController::class, 'index'])->name('acudientes.index');

    //Routas para Usuarios
    Route::get('usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('usuarios/index', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios{usuario}', [UserController::class, 'update'])->name('usuarios.update');

    //Routas para Areas
    Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
    Route::get('areas/index', [AreaController::class, 'index'])->name('areas.index');
    Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');

    Route::put('areas{area}', [AreaController::class, 'update'])->name('areas.update');
      //Routas para atencion Areas
      Route::get('atencion_areas/create', [AtencionAreaController::class, 'create'])->name('atencion_areas.create');
      Route::post('atencion_areas', [AtencionAreaController::class, 'store'])->name('atencion_areas.store');
      Route::get('atencion_areas/index', [AtencionAreaController::class, 'index'])->name('atencion_areas.index');
      Route::get('atencion_areas/{aa}/edit', [AtencionAreaController::class, 'edit'])->name('atencion_aa.edit');
      Route::put('atencion_areas{aa}', [AtencionAreaController::class, 'update'])->name('atencion_aa.update');
  
      //Routas para citas
      Route::get('citas/createArea', [CitaController::class, 'createArea'])->name('citas.createArea');
      Route::post('citas', [CitaController::class, 'storeArea'])->name('citas.storeArea');
      Route::get('citas/index', [CitaController::class, 'index'])->name('citas.index');
      Route::get('citas/{area}/edit', [CitaController::class, 'edit'])->name('citas.edit');
      Route::put('citas{area}', [CitaController::class, 'update'])->name('citas.update');
  
    //Routas para Grado
    Route::get('grados/create', [GradoController::class, 'create'])->name('grados.create');
    Route::post('grados', [GradoController::class, 'store'])->name('grados.store');
    Route::get('grados/index', [GradoController::class, 'index'])->name('grados.index');
    Route::get('grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit');
    Route::put('grados{grado}', [GradoController::class, 'update'])->name('grados.update');

    //Routas para cursos
    Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('cursos/index', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('cursos{curso}', [CursoController::class, 'update'])->name('cursos.update');
  //Routas para cursos del profesor inciado session 
    Route::get('cursos/miscursos', [CursoController::class, 'miscursos'])->name('cursos.miscursos');
    Route::post('cursos', [CursoController::class, 'asistencia'])->name('cursos.asistencia');
    Route::get('cursos/verestudiante', [CursoController::class, 'verestudiante'])->name('cursos.verestudiante');

  //Routas para registro de asistencia y obligatorio el de cursos
  Route::post('asistencias', [RegistroAsistenciaController::class, 'store'])->name('asistencias.store');
  Route::post('asistencias/index', [RegistroAsistenciaController::class, 'index'])->name('asistencias.index');
  Route::post('asistencias/asistenciasEstudiante', [RegistroAsistenciaController::class, 'asistenciasEstudiante'])->name('asistencias.asistenciasEstudiante');
  Route::get('asistencias/{estudiante}/edit', [RegistroAsistenciaController::class, 'edit'])->name('asistencias.edit');
  Route::put('asistencias{estudiante}', [RegistroAsistenciaController::class, 'update'])->name('asistencias.update');
//consultas por el estudiante y acudiente
  Route::get('asistencia/miAsistencia', [RegistroAsistenciaController::class, 'miAsistencia'])->name('asistencias.misasistencias');
  Route::post('asistencias/AsistenciaEA', [RegistroAsistenciaController::class, 'AsistenciaEA'])->name('asistencias.AsistenciaEA');


    //Routas para registro de actividades del cursos
    Route::post('actividades/index', [ActividadController::class,'index'])->name('actividades.index');
    Route::post('actividades/create', [ActividadController::class,'create'])->name('actividades.create');
    Route::post('actividades', [ActividadController::class,'store'])->name('actividades.store');
    Route::get('actividades/{actividad}/edit', [ActividadController::class,'edit'])->name('actividades.edit');
    Route::put('actividades{actividad}', [ActividadController::class,'update'])->name('actividades.update');
    //Routas para Docentes curso
    Route::get('docentecurso/create', [DocenteCursoController::class, 'create'])->name('docentecurso.create');
    Route::get('docentecurso/miscursos', [DocenteCursoController::class, 'miscursos'])->name('docentecurso.miscursos');
    Route::post('docentecurso', [DocenteCursoController::class, 'store'])->name('docentecurso.store');
    Route::get('docentecurso/index', [DocenteCursoController::class, 'index'])->name('docentecurso.index');
    Route::get('docentecurso/{curso}/edit', [DocenteCursoController::class, 'edit'])->name('docentecurso.edit');
    Route::put('docentecurso{curso}', [DocenteCursoController::class, 'update'])->name('docentecurso.update');
     //Routas para materias
     Route::get('materias/create', [MateriaController::class, 'create'])->name('materias.create');
     Route::post('materias', [MateriaController::class, 'store'])->name('materias.store');
     Route::get('materias/index', [MateriaController::class, 'index'])->name('materias.index');
     Route::get('materias/{materias}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
     Route::put('materias{materias}', [MateriaController::class, 'update'])->name('materias.update');
    //Routas para Pqrs
    Route::get('pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
    Route::post('pqrs', [PqrsController::class, 'store'])->name('pqrs.store');
    Route::get('pqrs/index', [PqrsController::class, 'index'])->name('pqrs.index');
    Route::get('pqrs/{pqrs}/responder', [PqrsController::class, 'responder'])->name('pqrs.responder');
    Route::put('pqrs{pqrs}', [PqrsController::class, 'update'])->name('pqrs.update');
    //Routas para notas
    Route::post('notas/create', [RegistroNotaController::class, 'create'])->name('notas.create');
    Route::post('notas', [RegistroNotaController::class, 'store'])->name('notas.store');
    Route::get('notas/index', [RegistroNotaController::class, 'index'])->name('notas.index');
    Route::get('notas/{notas}/edit', [RegistroNotaController::class, 'edit'])->name('notas.edit');
    Route::put('notas{notas}', [RegistroNotaController::class, 'update'])->name('notas.update');
    //consultas para notas acudiente y estudiante
    Route::get('notas/minotas', [RegistroNotaController::class, 'minotas'])->name('notas.misnotas');
    Route::post('notas/notasEA', [RegistroNotaController::class, 'notasEA'])->name('notas.notasEA');


    //Pruebas Ajax -- Graficas
    Route::post('materias/all', [MateriaController::class, 'all'])->name('materias.all');// prueba
    Route::post('graficas/pqrs', [PqrsController::class, 'graficar'])->name('graficas.pqrs');
    //Metodos posts para graficas
    Route::post('graficas/usuariosRol', [graficasController::class, 'graficarUsuariosPorRol'])->name('usuariosVerGrafica');
     // rutas para graficas
    Route::get('graficas/pqrs', [PqrsController::class, 'vergrafica'])->name('pqrs.vergrafica');
    Route::get('graficas/usuarios', [graficasController::class, 'vergraficaUsuarios'])->name('usuariosVerGrafica');


    Route::post('docentecurso', [DocenteCursoController::class, 'crearplantillas'])->name('docentecurso.crearplantillas');
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});

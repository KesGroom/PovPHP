<?php

use App\Exports\UserExport;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AtencionAreaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RegistroAsistenciaController;
use App\Http\Controllers\RegistroNotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

  Route::get('/email/verify', function () {
    return view('auth.verify-email');
  })->middleware(['auth'])->name('verification.notice');

  Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
  })->middleware(['auth', 'signed'])->name('verification.verify');

  Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
  })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

  //---------- Rutas para control del usuario de sesión ----------------------------------------------------------------------------------\\

  Route::get('pages/userPages/{usuario}/editProfile', [UserController::class, 'editProfile'])->name('editProfile')->middleware(['auth', 'password.confirm']);
  Route::put('pages/userPages/changePhoto{usuarios}', [UserController::class, 'updatePhoto'])->name('userPages.updatePhoto');
  Route::put('pages/userPages/changeInfo{usuario}', [UserController::class, 'updateInfo'])->name('userPages.updateInfo');
  Route::put('pages/userPages/changePass{usuarioPass}', [UserController::class, 'updatePass'])->name('userPages.updatePass');

  //-------- Rutas para la administración de usuarios ------------------------------------------------------------------------------------------------------\\

  //--Rutas para usuarios
  Route::get('pages/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
  Route::post('pages/usuarios/create', [UserController::class, 'store'])->name('usuarios.store');
  Route::get('pages/usuarios/index', [UserController::class, 'index'])->name('usuarios.index');
  Route::get('pages/usuarios/recovery', [UserController::class, 'recovery'])->name('usuarios.recovery');
  Route::put('pages/usuarios/recovery{usuario}', [UserController::class, 'restore'])->name('usuarios.restore');
  Route::get('pages/usuarios/index{usuario}', [UserController::class, 'indexRol'])->name('usuarios.indexRol');
  Route::put('pages/usuarios/index/resetPhoto{usuario}', [UserController::class, 'photoReset'])->name('usuarios.photoReset');
  Route::put('pages/usuarios/index{usuario}', [UserController::class, 'delete'])->name('usuarios.delete');
  Route::get('pages/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
  Route::put('pages/usuarios/{usuario}/edit', [UserController::class, 'update'])->name('usuarios.update');

  //---Excel---
  Route::get('exports/users', [UserController::class, 'export'])->name('usuarios.export');
  Route::get('exports/usersTemplate', [UserController::class, 'template'])->name('usuarios.template');
  Route::post('usuarios/index', [UserController::class, 'import'])->name('usuarios.import');
  //---Buscador---
  Route::get('usuarios/buscador', [UserController::class, 'searchList']);
  Route::get('usuarios/UserResult', [UserController::class, 'searchList']);

  //-------- Rutas para la administración de noticias ------------------------------------------------------------------------------------------------------\\

  //Rutas para noticias
  Route::get('pages/news/create', [NoticiaController::class, 'create'])->name('news.create');
  Route::get('pages/news/index', [NoticiaController::class, 'index'])->name('news.index');
  Route::get('pages/news/recovery', [NoticiaController::class, 'recovery'])->name('news.recovery');
  Route::put('pages/news/recovery/restore{noticia}', [NoticiaController::class, 'restore'])->name('news.restore');
  Route::get('pages/news/{noticia}/edit', [NoticiaController::class, 'edit'])->name('news.edit');
  Route::post('pages/news/create', [NoticiaController::class, 'store'])->name('news.store');
  Route::put('pages/news/delete{new}', [NoticiaController::class, 'delete'])->name('news.delete');
  Route::put('pages/news{noticia}', [NoticiaController::class, 'update'])->name('news.update');
  //---Buscador---
  Route::get('news/buscador', [NoticiaController::class, 'searchList']);
  Route::get('news/newsResult', [NoticiaController::class, 'searchList']);
  //---Excel---
  Route::get('exports/news', [NoticiaController::class, 'export'])->name('news.export');
  Route::get('exports/newsTemplate', [NoticiaController::class, 'template'])->name('news.template');
  Route::post('news/index', [NoticiaController::class, 'import'])->name('news.import');

  Route::get('mail/index', [MailController::class, 'layout'])->name('mail.layout');
  Route::post('mail/index/mail', [MailController::class, 'postulacion'])->name('mail.postular');
  Route::post('mail/index/rees{user}', [MailController::class, 'replace'])->name('mail.rees');

  //------Rutas de la gestión acádemica----------------------------------------------------------------------------------------\\

  //--Rutas para areas
  Route::get('pages/areas/create', [AreaController::class, 'create'])->name('areas.create');
  Route::post('pages/areas', [AreaController::class, 'store'])->name('areas.store');
  Route::get('pages/areas/index', [AreaController::class, 'index'])->name('areas.index');
  Route::get('pages/areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
  Route::put('pages/areas{area}', [AreaController::class, 'update'])->name('areas.update');

  //--Rutas para Grado
  Route::get('grados/create', [GradoController::class, 'create'])->name('grados.create');
  Route::post('grados', [GradoController::class, 'store'])->name('grados.store');
  Route::get('grados/index', [GradoController::class, 'index'])->name('grados.index');
  Route::get('grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit');
  Route::put('grados{grado}', [GradoController::class, 'update'])->name('grados.update');

  //--Rutas para cursos
  Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
  Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
  Route::get('cursos/index', [CursoController::class, 'index'])->name('cursos.index');
  Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
  Route::put('cursos{curso}', [CursoController::class, 'update'])->name('cursos.update');

  //--Rutas para Docentes curso
  Route::get('docentecurso/create', [DocenteCursoController::class, 'create'])->name('docentecurso.create');
  Route::get('docentecurso/miscursos', [DocenteCursoController::class, 'miscursos'])->name('docentecurso.miscursos');
  Route::post('docentecurso', [DocenteCursoController::class, 'store'])->name('docentecurso.store');
  Route::get('docentecurso/index', [DocenteCursoController::class, 'index'])->name('docentecurso.index');
  Route::get('docentecurso/{curso}/edit', [DocenteCursoController::class, 'edit'])->name('docentecurso.edit');
  Route::put('docentecurso{curso}', [DocenteCursoController::class, 'update'])->name('docentecurso.update');

  //--Rutas para materias
  Route::get('materias/create', [MateriaController::class, 'create'])->name('materias.create');
  Route::post('materias', [MateriaController::class, 'store'])->name('materias.store');
  Route::get('materias/index', [MateriaController::class, 'index'])->name('materias.index');
  Route::get('materias/{materias}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
  Route::put('materias{materias}', [MateriaController::class, 'update'])->name('materias.update');

  //---------------- Rutas para la administración de PQRS -----------------------------------------------------------------------------------------------\\

  Route::get('pages/pqrs/index', [PqrsController::class, 'index'])->name('pqrs.index');
  Route::get('pages/pqrs/{pqrs}/responder', [PqrsController::class, 'responder'])->name('pqrs.responder');
  Route::put('pages/pqrs{pqrs}', [PqrsController::class, 'update'])->name('pqrs.update');
  Route::put('pages/pqrs/delete{pqrs}', [PqrsController::class, 'delete'])->name('pqrs.delete');
  Route::get('pages/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
  Route::post('pages/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');


  //------------------- Rutas para la administración de citas ------------------------------------------------------------------------------------\\

  //--Rutas para atencion Areas
  Route::get('atencion_areas/create', [AtencionAreaController::class, 'create'])->name('atencion_areas.create');
  Route::post('atencion_areas', [AtencionAreaController::class, 'store'])->name('atencion_areas.store');
  Route::get('atencion_areas/index', [AtencionAreaController::class, 'index'])->name('atencion_areas.index');
  Route::get('atencion_areas/{aa}/edit', [AtencionAreaController::class, 'edit'])->name('atencion_aa.edit');
  Route::put('atencion_areas{aa}', [AtencionAreaController::class, 'update'])->name('atencion_aa.update');

  //--Rutas para citas
  Route::get('citas/createArea', [CitaController::class, 'createArea'])->name('citas.createArea');
  Route::post('citas', [CitaController::class, 'storeArea'])->name('citas.storeArea');
  Route::get('citas/index', [CitaController::class, 'index'])->name('citas.index');
  Route::get('citas/{area}/edit', [CitaController::class, 'edit'])->name('citas.edit');
  Route::put('citas{area}', [CitaController::class, 'update'])->name('citas.update');

  //--------------------------------------------------------------------------------------------------------------------------\\

  //Falta atencion curso

  //---------------Rutas para la administración de servicio social ----------------------------------------------------------------------------------------\\

  //Falta servicio social

  //--------------------------------------------------------------------------------------------------------------------------\\

  //----------------Rutas para consulta de cursos ----------------------------------------------------------------------------------------------\\

  Route::get('cursos/miscursos', [CursoController::class, 'miscursos'])->name('cursos.miscursos');
  Route::post('cursos', [CursoController::class, 'asistencia'])->name('cursos.asistencia');
  Route::get('cursos/verestudiante', [CursoController::class, 'verestudiante'])->name('cursos.verestudiante');

  //----------------Rutas para realizar registros --------------------------------------------------------------------------\\

  //--Rutas para registro de asistencia y obligatorio el de cursos
  Route::post('asistencias', [RegistroAsistenciaController::class, 'store'])->name('asistencias.store');
  Route::get('asistencias/index', [RegistroAsistenciaController::class, 'index'])->name('asistencias.index');
  Route::post('asistencias/asistenciasEstudiante', [RegistroAsistenciaController::class, 'asistenciasEstudiante'])->name('asistencias.asistenciasEstudiante');
  Route::get('asistencias/{estudiante}/edit', [RegistroAsistenciaController::class, 'edit'])->name('asistencias.edit');
  Route::put('asistencias{estudiante}', [RegistroAsistenciaController::class, 'update'])->name('asistencias.update');

  //--Rutas para notas
  Route::post('notas/create', [RegistroNotaController::class, 'create'])->name('notas.create');
  Route::post('notas', [RegistroNotaController::class, 'store'])->name('notas.store');
  Route::get('notas/index', [RegistroNotaController::class, 'index'])->name('notas.index');
  Route::get('notas/{notas}/edit', [RegistroNotaController::class, 'edit'])->name('notas.edit');
  Route::put('notas{notas}', [RegistroNotaController::class, 'update'])->name('notas.update');

  //------------------ Rutas para el registro de actividades --------------------------------------------------------------------------\\

  Route::post('actividades/index', [ActividadController::class, 'index'])->name('actividades.index');
  Route::post('actividades/create', [ActividadController::class, 'create'])->name('actividades.create');
  Route::post('actividades', [ActividadController::class, 'store'])->name('actividades.store');
  Route::get('actividades/{actividad}/edit', [ActividadController::class, 'edit'])->name('actividades.edit');
  Route::put('actividades{actividad}', [ActividadController::class, 'update'])->name('actividades.update');

  //--------------------------------------------------------------------------------------------------------------------------\\

  //Rutas para Pqrs
  Route::post('docentecurso', [DocenteCursoController::class, 'crearplantillas'])->name('docentecurso.crearplantillas');

  //-----------Rutas para la administración de citas ---------------------------------------------------------------------------------------------\\


  //-----------Consultas academicas -------------------------------------------------------------------------------\\

  //--Consultas para notas acudiente y estudiante
  Route::get('notas/minotas', [RegistroNotaController::class, 'minotas'])->name('notas.misnotas');
  Route::post('notas/notasEA', [RegistroNotaController::class, 'notasEA'])->name('notas.notasEA');

  //--Consultas por el estudiante y acudiente
  Route::get('asistencia/miAsistencia', [RegistroAsistenciaController::class, 'miAsistencia'])->name('asistencias.misasistencias');
  Route::post('asistencias/AsistenciaEA', [RegistroAsistenciaController::class, 'AsistenciaEA'])->name('asistencias.AsistenciaEA');

  //------------Gráficas-----------------------------------------------------------------------------------------------\\

  //Pruebas Ajax -- Graficas
  Route::post('materias/all', [MateriaController::class, 'all'])->name('materias.all'); // prueba
  Route::post('graficas/pqrs', [PqrsController::class, 'graficar'])->name('graficas.pqrs');
  // rutas para graficas
  Route::get('graficas/pqrs', [PqrsController::class, 'vergrafica'])->name('pqrs.vergrafica');


  //--------------------------------------------------------------------------------------------------------------------------\\


  //----------- Rutas del sistema --------------------------------------------------------------------------------------\\    


  Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

  Auth::routes(['verify' => true]);

  Route::get('/home', [HomeController::class, 'index'])->name('home');


  Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return Redirect::back();
  })->where([
    'lang' => 'en|es'
  ]);
});

<?php

use App\Exports\UserExport;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AgendaWebController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AtencionAreaController;
use App\Http\Controllers\AtencionCursoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\BitacoraServicioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\graficasController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RegistroAsistenciaController;
use App\Http\Controllers\RegistroNotaController;
use App\Http\Controllers\WelcomeController;
use App\Models\Atencion_curso;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\SalaServicioController;
use App\Http\Controllers\ZonaServicioController;
use App\Http\Controllers\UserController;
use App\Models\Bitacora_servicio;
use App\Models\Docente_curso;
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

  //--Ruta de acceso principal
  Route::get('pages/administracion_academica/index', [AreaController::class, 'index'])->name('areas.index');

  //--Rutas para areas
  Route::get('pages/areas/create', [AreaController::class, 'create'])->name('areas.create');
  Route::post('pages/areas', [AreaController::class, 'store'])->name('areas.store');
  Route::get('pages/areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
  Route::put('pages/areas{area}', [AreaController::class, 'update'])->name('areas.update');
  Route::put('pages/areas/delete{area}', [AreaController::class, 'delete'])->name('areas.delete');

  //--Rutas para Grado
  Route::get('pages/grados/create', [GradoController::class, 'create'])->name('grados.create');
  Route::post('pages/grados', [GradoController::class, 'store'])->name('grados.store');
  Route::get('pages/grados/index', [GradoController::class, 'index'])->name('grados.index');
  Route::get('pages/grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit');
  Route::put('pages/grados{grado}', [GradoController::class, 'update'])->name('grados.update');
  Route::put('pages/grados/delete{grado}', [GradoController::class, 'delete'])->name('grados.delete');

  //--Rutas para cursos
  Route::get('pages/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
  Route::post('pages/cursos', [CursoController::class, 'store'])->name('cursos.store');
  Route::get('pages/cursos/index', [CursoController::class, 'index'])->name('cursos.index');
  Route::get('pages/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
  Route::put('pages/cursos{curso}', [CursoController::class, 'update'])->name('cursos.update');
  Route::put('pages/cursos/delete{curso}', [CursoController::class, 'delete'])->name('cursos.delete');

  //--Rutas para materias
  Route::get('pages/materias/create', [MateriaController::class, 'create'])->name('materias.create');
  Route::post('pages/materias', [MateriaController::class, 'store'])->name('materias.store');
  Route::get('pages/materias/index', [MateriaController::class, 'index'])->name('materias.index');
  Route::get('pages/materias/{materias}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
  Route::put('pages/materias{materias}', [MateriaController::class, 'update'])->name('materias.update');
  Route::put('pages/materias/delete{materia}', [MateriaController::class, 'delete'])->name('materias.delete');

  //--Rutas para Docentes curso
  Route::get('pages/docentecurso/create', [DocenteCursoController::class, 'create'])->name('docentecurso.create');
  Route::get('pages/docentecurso/miscursos', [DocenteCursoController::class, 'miscursos'])->name('docentecurso.miscursos');
  Route::post('pages/docentecurso', [DocenteCursoController::class, 'store'])->name('docentecurso.store');
  Route::get('pages/docentecurso/index', [DocenteCursoController::class, 'index'])->name('docentecurso.index');
  Route::get('pages/docentecurso/{curso}/edit', [DocenteCursoController::class, 'edit'])->name('docentecurso.edit');
  Route::put('pages/docentecurso{curso}', [DocenteCursoController::class, 'update'])->name('docentecurso.update');

  //---------------- Rutas para la administración de PQRS -----------------------------------------------------------------------------------------------\\

  Route::get('pages/pqrs/index', [PqrsController::class, 'index'])->name('pqrs.index');
  Route::get('pages/pqrs/{pqrs}/responder', [PqrsController::class, 'responder'])->name('pqrs.responder');
  Route::put('pages/pqrs{pqrs}', [PqrsController::class, 'update'])->name('pqrs.update');
  Route::put('pages/pqrs/delete{pqrs}', [PqrsController::class, 'delete'])->name('pqrs.delete');
  Route::get('pages/pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
  Route::post('pages/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');


  //------------------- Rutas para la administración de citas ------------------------------------------------------------------------------------\\

  //Routas para atencion Areas
  Route::get('pages/atencion_areas/create', [AtencionAreaController::class, 'create'])->name('atencion_areas.create');
  Route::post('pages/atencion_areas/DocenteArea', [AtencionAreaController::class, 'DocenteArea'])->name('DocenteArea.create');
  Route::post('pages/atencion_areas', [AtencionAreaController::class, 'store'])->name('atencion_areas.store');
  Route::get('pages/atencion_areas/index', [AtencionAreaController::class, 'index'])->name('atencion_areas.index');
  Route::get('pages/atencion_areas/{aa}/edit', [AtencionAreaController::class, 'edit'])->name('atencion_aa.edit');
  Route::put('pages/atencion_areas{aa}', [AtencionAreaController::class, 'update'])->name('atencion_aa.update');
  /// Rutas para antecion curso
  Route::get('pages/atencion_curso/create', [AtencionCursoController::class, 'create'])->name('atencion_curso.create');
  Route::post('pages/atencion_curso', [AtencionCursoController::class, 'store'])->name('atencion_curso.store');
  Route::post('pages/atencion_curso/DocenteCurso', [AtencionCursoController::class, 'DocenteCurso'])->name('DocenteCurso.create');
  Route::get('pages/atencion_curso/index', [AtencionCursoController::class, 'index'])->name('atencion_curso.index');
  Route::get('pages/atencion_curso/{ac}/edit', [AtencionCursoController::class, 'edit'])->name('atencion_ac.edit');
  Route::put('pages/atencion_curso{ac}', [AtencionCursoController::class, 'update'])->name('atencion_ac.update');
  //Routas para citas
  Route::get('pages/citas/crearCita', [CitaController::class, 'crearCita'])->name('citas.crearCita');
  Route::get('pages/citas/solitarCita', [CitaController::class, 'solitarCita'])->name('citas.solitarCita');
  Route::post('pages/citas/reiniciar', [CitaController::class, 'reiniciarCitas'])->name('citas.reiniciarCitas');
  Route::post('pages/citas/asuntoCita', [CitaController::class, 'asuntoCita'])->name('citas.asuntoCita');
  Route::post('pages/citas/AgendarCita', [CitaController::class, 'AgendarCita'])->name('citas.AgendarCita');
  Route::post('pages/citas', [CitaController::class, 'storeArea'])->name('citas.storeArea');
  Route::get('pages/citas/index', [CitaController::class, 'index'])->name('citas.index');
  Route::get('pages/citas/miscitas', [CitaController::class, 'miscitas'])->name('citas.miscitas');
  Route::get('pages/citas/{area}/edit', [CitaController::class, 'edit'])->name('citas.edit');
  Route::put('pages/citas{area}', [CitaController::class, 'update'])->name('citas.update');

  //--------------------------------------------------------------------------------------------------------------------------\\

  //Falta atencion curso

  //---------------Rutas para la administración de servicio social ----------------------------------------------------------------------------------------\\

  //--Rutas para zona de servicio social
  Route::get('pages/zonas/create', [ZonaServicioController::class, 'create'])->name('zonas.create');
  Route::get('pages/zonas/index', [ZonaServicioController::class, 'index'])->name('zonas.index');
  Route::post('pages/zonas', [ZonaServicioController::class, 'store'])->name('zonas.store');
  Route::get('pages/zonas/{zona}/edit', [ZonaServicioController::class, 'edit'])->name('zonas.edit');
  Route::post('pages/zonas/{zona}', [ZonaServicioController::class, 'update'])->name('zonas.update');
  Route::put('pages/zonas/delete{zona}', [ZonaServicioController::class, 'delete'])->name('zonas.delete');
  Route::put('pages/zonas/index/block{zona}', [ZonaServicioController::class, 'block'])->name('zonas.block');
  Route::put('pages/zonas/index/unblock{zona}', [ZonaServicioController::class, 'unblock'])->name('zonas.unblock');


  //--Rutas para bitacora de servicio social
  Route::get('pages/bitacora/create{sala}', [BitacoraServicioController::class, 'create'])->name('bitacora.create');
  Route::get('pages/bitacora/index', [BitacoraServicioController::class, 'index'])->name('bitacora.index');
  Route::get('pages/bitacora/index{id}', [BitacoraServicioController::class, 'indexBit'])->name('bitacora.indexBit');
  Route::post('pages/bitacora/index{sala}', [BitacoraServicioController::class, 'store'])->name('bitacora.store');
  Route::get('pages/bitacora/{bita}/edit', [BitacoraServicioController::class, 'edit'])->name('bitacora.edit');
  Route::post('pages/bitacora/{bita}', [BitacoraServicioController::class, 'update'])->name('bitacora.update');
  Route::put('pages/bitacora/delete{bita}', [BitacoraServicioController::class, 'delete'])->name('bitacora.delete');
  Route::get('pages/bitacora/{name}/certificado', [BitacoraServicioController::class, 'certificado'])->name('bitacora.certificado');

  //--Rutas para la sala de servicio 
  Route::get('pages/sala/index', [SalaServicioController::class, 'index'])->name('sala.index');
  Route::put('pages/sala/index{zona}', [SalaServicioController::class, 'store'])->name('sala.store');
  Route::put('pages/sala/index/aceptar{salas}', [SalaServicioController::class, 'aceptar'])->name('sala.aceptar');
  Route::put('pages/sala/index/rechazar{salas}', [SalaServicioController::class, 'rechazar'])->name('sala.rechazar');
  Route::put('pages/sala/delete{salas}', [SalaServicioController::class, 'delete'])->name('sala.delete');

  //--------------------------------------------------------------------------------------------------------------------------\\

  //----------------Rutas para consulta de cursos ----------------------------------------------------------------------------------------------\\

  Route::get('pages/cursos/miscursos', [CursoController::class, 'miscursos'])->name('cursos.miscursos');
  Route::post('pages/cursos', [CursoController::class, 'asistencia'])->name('cursos.asistencia');
  Route::get('pages/cursos/verestudiante', [CursoController::class, 'verestudiante'])->name('cursos.verestudiante');

  //----------------Rutas para realizar registros --------------------------------------------------------------------------\\

  //--Rutas para registro de asistencia y obligatorio el de cursos
  Route::post('pages/asistencias', [RegistroAsistenciaController::class, 'store'])->name('asistencias.store');
  Route::get('pages/asistencias/index', [RegistroAsistenciaController::class, 'index'])->name('asistencias.index');
  Route::post('pages/asistencias/asistenciasEstudiante', [RegistroAsistenciaController::class, 'asistenciasEstudiante'])->name('asistencias.asistenciasEstudiante');
  Route::get('pages/asistencias/{estudiante}/edit', [RegistroAsistenciaController::class, 'edit'])->name('asistencias.edit');
  Route::put('pages/asistencias{estudiante}', [RegistroAsistenciaController::class, 'update'])->name('asistencias.update');

  //--Rutas para notas
  Route::post('pages/notas/create', [RegistroNotaController::class, 'create'])->name('notas.create');
  Route::post('pages/notas', [RegistroNotaController::class, 'store'])->name('notas.store');
  Route::get('pages/notas/index', [RegistroNotaController::class, 'index'])->name('notas.index');
  Route::get('pages/notas/{notas}/edit', [RegistroNotaController::class, 'edit'])->name('notas.edit');
  Route::put('pages/notas{notas}', [RegistroNotaController::class, 'update'])->name('notas.update');

  //------------------ Rutas para el registro de actividades --------------------------------------------------------------------------\\

  Route::post('pages/actividades/index', [ActividadController::class, 'index'])->name('actividades.index');
  Route::post('pages/actividades/create', [ActividadController::class, 'create'])->name('actividades.create');
  Route::post('pages/actividades', [ActividadController::class, 'store'])->name('actividades.store');
  Route::get('pages/actividades/{actividad}/edit', [ActividadController::class, 'edit'])->name('actividades.edit');
  Route::put('pages/actividades{actividad}', [ActividadController::class, 'update'])->name('actividades.update');
  //------------------ Rutas para el registro de Agenda web --------------------------------------------------------------------------\\

  Route::post('pages/agendaWeb/index', [AgendaWebController::class, 'index'])->name('agendaWeb.index');
  Route::post('pages/agendaWeb/create', [AgendaWebController::class, 'create'])->name('agendaWeb.create');
  Route::post('pages/agendaWeb', [AgendaWebController::class, 'store'])->name('agendaWeb.store');
  Route::get('pages/agendaWeb/{agenda}/edit', [AgendaWebController::class, 'edit'])->name('agendaWeb.edit');
  Route::put('pages/agendaWeb{agenda}', [AgendaWebController::class, 'update'])->name('agenda.update');
  //--------------------------------------------------------------------------------------------------------------------------\\
  //-----------Rutas para la administración de citas ---------------------------------------------------------------------------------------------\\


  //-----------Consultas academicas -------------------------------------------------------------------------------\\

  //--Consultas para notas acudiente y estudiante
  Route::get('pages/notas/minotas', [RegistroNotaController::class, 'minotas'])->name('notas.misnotas');
  Route::post('pages/notas/notasEA', [RegistroNotaController::class, 'notasEA'])->name('notas.notasEA');

  //--Consultas por el estudiante y acudiente
  Route::get('pages/asistencia/miAsistencia', [RegistroAsistenciaController::class, 'miAsistencia'])->name('asistencias.misasistencias');
  Route::post('pages/asistencias/AsistenciaEA', [RegistroAsistenciaController::class, 'AsistenciaEA'])->name('asistencias.AsistenciaEA');

  //------------Gráficas-----------------------------------------------------------------------------------------------\\

  //Pruebas Ajax -- Graficas
  Route::post('materias/all', [MateriaController::class, 'all'])->name('materias.all'); // prueba
  Route::post('graficas/pqrs', [PqrsController::class, 'graficar'])->name('graficas.pqrs');
  //Metodos posts para graficas Usuario
  Route::post('graficas/usuariosRol', [graficasController::class, 'graficarUsuariosPorRol'])->name('usuariosVerGrafica');
  Route::post('graficas/usuariosMes', [graficasController::class, 'graficarUsuariosPorAño'])->name('usuariosVerGrafica');
  Route::post('graficas/graficarGenero', [graficasController::class, 'graficarGenero'])->name('usuariosVerGrafica');
  Route::post('graficas/graficarEstudiantesServicioSocial', [graficasController::class, 'graficarEstudiantes'])->name('usuariosVerGrafica');
  //Metodos posts para graficas Cursos
  Route::post('graficas/graficarCantidadEstudiantesCurso', [graficasController::class, 'graficarCantidadEstudiantesCurso'])->name('usuariosVerGrafica');
  //Metodos post para graficas Asistencia
  Route::post('graficas/AsistenciaTodos', [graficasController::class, 'graficarCantidadEstudiantesAsistenciaHoy'])->name('asistenciaTodosVerGrafica');

  // rutas para graficas
  Route::get('graficas/pqrs', [PqrsController::class, 'vergrafica'])->name('pqrs.vergrafica');
  Route::get('graficas/usuarios', [graficasController::class, 'vergraficaUsuarios'])->name('usuariosVerGrafica');
  Route::get('graficas/cursos', [graficasController::class, 'vergraficaCursos'])->name('cursosVerGrafica');
  Route::get('graficas/asitenciaTodos', [graficasController::class, 'vergraficaAsistenciaTodos'])->name('asistenciaVerGrafica');
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

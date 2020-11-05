<?php

use App\Exports\UserExport;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BitacoraServicioController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\SalaServicioController;
use App\Http\Controllers\ServicioSocialController;
use App\Http\Controllers\UserController;
use App\Models\Bitacora_servicio;
use App\Models\Docente_curso;
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
    Route::get('usuarios/index{usuario}', [UserController::class, 'indexRol'])->name('usuarios.indexRol');
    Route::put('usuarios/index/resetPhoto{usuario}', [UserController::class, 'photoReset'])->name('usuarios.photoReset');
    Route::put('usuarios/index/delete{usuario}', [UserController::class, 'delete'])->name('usuarios.delete');
    Route::get('usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('usuarios{usuario}', [UserController::class, 'update'])->name('usuarios.update');

    //Rutas para noticias
    Route::get('pages/news/create', [NoticiaController::class, 'create'])->name('news.create');
    Route::get('pages/news/index', [NoticiaController::class, 'index'])->name('news.index');
    Route::get('pages/news', [NoticiaController::class, 'store'])->name('news.store');
    Route::get('emails/correo',[CorreoController::class, 'send'])->name('emails.correo');
    Route::post('correo',[CorreoController::class, 'enviar'])->name('correo.enviar');
    Route::post('correoRechazado',[CorreoController::class, 'rechazar'])->name('correo.rechazar');

    //Routas para Areas
    Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
    Route::get('areas/index', [AreaController::class, 'index'])->name('areas.index');
    Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
    Route::put('areas{area}', [AreaController::class, 'update'])->name('areas.update');

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


    //Rutas para Servicio social
    Route::get('zonas/create', [ServicioSocialController::class, 'create'])->name('zonas.create');
    Route::get('zonas/index', [ServicioSocialController::class, 'index'])->name('zonas.index');
    Route::post('zonas', [ServicioSocialController::class, 'store'])->name('zonas.store');
    Route::get('zonas/{zona}/edit', [ServicioSocialController::class, 'edit'])->name('zonas.edit');
    Route::post('zonas/{zona}', [ServicioSocialController::class, 'update'])->name('zonas.update');


    
    //Rutas para bitacora social
    Route::get('bitacora/create', [BitacoraServicioController::class, 'create'])->name('bitacora.create');
    Route::get('bitacora/index', [BitacoraServicioController::class, 'index'])->name('bitacora.index');
    Route::post('bitacora', [BitacoraServicioController::class, 'store'])->name('bitacora.store');
    Route::get('bitacora/{bita}/edit', [BitacoraServicioController::class, 'edit'])->name('bitacora.edit');
    Route::post('bitacora/{bita}', [BitacoraServicioController::class, 'update'])->name('bitacora.update');

    // Rutas para la sala de servicio 
    Route::get('sala/index', [SalaServicioController::class, 'index'])->name('sala.index');
    Route::post('sala', [SalaServicioController::class, 'store'])->name('sala.store');


    //Routas para Docentes curso
    Route::get('docentecurso/create', [DocenteCursoController::class, 'create'])->name('docentecurso.create');
    Route::get('docentecurso/miscursos', [DocenteCursoController::class, 'miscursos'])->name('docentecurso.miscursos');
    Route::post('docentecurso', [DocenteCursoController::class, 'store'])->name('docentecurso.store');
    Route::get('docentecurso/index', [DocenteCursoController::class, 'index'])->name('docentecurso.index');
    Route::get('docentecurso/{curso}/edit', [DocenteCursoController::class, 'edit'])->name('docentecurso.edit');
    Route::put('docentecurso{curso}', [DocenteCursoController::class, 'update'])->name('docentecurso.update');
    //Routas para Pqrs
    Route::get('pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
    Route::post('pqrs', [PqrsController::class, 'store'])->name('pqrs.store');
    Route::get('pqrs/index', [PqrsController::class, 'index'])->name('pqrs.index');
    Route::get('pqrs/{pqrs}/responder', [PqrsController::class, 'responder'])->name('pqrs.responder');
    Route::put('pqrs{pqrs}', [PqrsController::class, 'update'])->name('pqrs.update');

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

    //Exportaciones
    //---Excel---
    //UserExport
    Route::get('exports/users', [UserController::class, 'export'])->name('usuarios.export');
    Route::get('exports/usersTemplate', [UserController::class, 'template'])->name('usuarios.template');
    Route::post('usuarios/index', [UserController::class, 'import'])->name('usuarios.import');

});

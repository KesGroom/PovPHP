<?php

use App\Exports\UserExport;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\UserController;
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
    Route::get('pages/userPages/{usuario}/editProfile', [UserController::class, 'editProfile'])->name('editProfile');
    Route::put('pages/userPages/changePhoto{usuarios}', [UserController::class, 'updatePhoto'])->name('userPages.updatePhoto');
    Route::put('pages/userPages/changeInfo{usuario}', [UserController::class, 'updateInfo'])->name('userPages.updateInfo');
    Route::put('pages/userPages/changePass{usuarioPass}', [UserController::class, 'updatePass'])->name('userPages.updatePass');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rotas para Acudiente
    Route::get('acudientes/create', [AcudienteController::class, 'create'])->name('acudientes.create');
    Route::post('acudientes', [AcudienteController::class, 'store'])->name('acudientes.store');
    Route::get('acudientes/index', [AcudienteController::class, 'index'])->name('acudientes.index');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para Usuarios
    Route::get('pages/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('pages/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('pages/usuarios/index', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('pages/usuarios/recovery', [UserController::class, 'recovery'])->name('usuarios.recovery');
    Route::put('pages/usuarios/recovery/restore{usuario}', [UserController::class, 'restore'])->name('usuarios.restore');
    Route::get('pages/usuarios/index{usuario}', [UserController::class, 'indexRol'])->name('usuarios.indexRol');
    Route::put('pages/usuarios/index/resetPhoto{usuario}', [UserController::class, 'photoReset'])->name('usuarios.photoReset');
    Route::put('pages/usuarios/delete{usuario}', [UserController::class, 'delete'])->name('usuarios.delete');
    Route::get('pages/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('pages/usuarios{usuario}', [UserController::class, 'update'])->name('usuarios.update');
    //---Excel---
    Route::get('exports/users', [UserController::class, 'export'])->name('usuarios.export');
    Route::get('exports/usersTemplate', [UserController::class, 'template'])->name('usuarios.template');
    Route::post('usuarios/index', [UserController::class, 'import'])->name('usuarios.import');
    //---Buscador---
    Route::get('usuarios/buscador', [UserController::class, 'searchList']);
    Route::get('usuarios/UserResult', [UserController::class, 'searchList']);

    //--------------------------------------------------------------------------------------------------------------------------\\

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

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para Areas
    Route::get('areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::post('areas', [AreaController::class, 'store'])->name('areas.store');
    Route::get('areas/index', [AreaController::class, 'index'])->name('areas.index');
    Route::get('areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
    Route::put('areas{area}', [AreaController::class, 'update'])->name('areas.update');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para Grado
    Route::get('grados/create', [GradoController::class, 'create'])->name('grados.create');
    Route::post('grados', [GradoController::class, 'store'])->name('grados.store');
    Route::get('grados/index', [GradoController::class, 'index'])->name('grados.index');
    Route::get('grados/{grado}/edit', [GradoController::class, 'edit'])->name('grados.edit');
    Route::put('grados{grado}', [GradoController::class, 'update'])->name('grados.update');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para cursos
    Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('cursos/index', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('cursos{curso}', [CursoController::class, 'update'])->name('cursos.update');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para Docentes curso
    Route::get('docentecurso/create', [DocenteCursoController::class, 'create'])->name('docentecurso.create');
    Route::get('docentecurso/miscursos', [DocenteCursoController::class, 'miscursos'])->name('docentecurso.miscursos');
    Route::post('docentecurso', [DocenteCursoController::class, 'store'])->name('docentecurso.store');
    Route::get('docentecurso/index', [DocenteCursoController::class, 'index'])->name('docentecurso.index');
    Route::get('docentecurso/{curso}/edit', [DocenteCursoController::class, 'edit'])->name('docentecurso.edit');
    Route::put('docentecurso{curso}', [DocenteCursoController::class, 'update'])->name('docentecurso.update');
    Route::post('docentecurso', [DocenteCursoController::class, 'crearplantillas'])->name('docentecurso.crearplantillas');

    //--------------------------------------------------------------------------------------------------------------------------\\

    //Rutas para Pqrs
    Route::get('pqrs/create', [PqrsController::class, 'create'])->name('pqrs.create');
    Route::post('pqrs', [PqrsController::class, 'store'])->name('pqrs.store');
    Route::get('pqrs/index', [PqrsController::class, 'index'])->name('pqrs.index');
    Route::get('pqrs/{pqrs}/responder', [PqrsController::class, 'responder'])->name('pqrs.responder');
    Route::put('pqrs{pqrs}', [PqrsController::class, 'update'])->name('pqrs.update');

    //--------------------------------------------------------------------------------------------------------------------------\\


    //--------------------------------------------------------------------------------------------------------------------------\\    

    //Rutas del sistema

    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteCursoController;
use App\Http\Controllers\GradoController;
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
    //Routas para Acudiente
    Route::get('acudientes/create', [AcudienteController::class, 'create'])->name('acudientes.create');
    Route::post('acudientes', [AcudienteController::class, 'store'])->name('acudientes.store');
    Route::get('acudientes/index', [AcudienteController::class, 'index'])->name('acudientes.index');

    //Routas para Acudiente
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
    });

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);
});

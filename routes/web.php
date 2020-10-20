<?php

use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Routas para Acudiente
Route::get('acudientes/create',[AcudienteController::class,'create'])->name('acudientes.create');
Route::post('acudientes',[AcudienteController::class,'store'])->name('acudientes.store');
Route::get('acudientes/index',[AcudienteController::class,'index'])->name('acudientes.index');

//Routas para Acudiente
Route::get('usuarios/create',[UserController::class,'create'])->name('usuarios.create');
Route::post('usuarios',[UserController::class,'store'])->name('usuarios.store');
Route::get('usuarios/index',[UserController::class,'index'])->name('usuarios.index');

Route::get('usuarios/{usuario}/edit',[UserController::class,'edit'])->name('usuarios.edit');
Route::put('usuarios{usuario}',[UserController::class,'update'])->name('usuarios.update');

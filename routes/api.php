<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/nivel_educativo/{nivel}/grados', [GradoController::class, 'getGrades']);
Route::get('/grado/{grado}/curso', [CursoController::class, 'getCourses']);
Route::get('/area/{area}/materia', [MateriaController::class, 'getMaterias']);

<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//especialidades
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);
Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);

Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);

//departamentos
Route::get('/departamentos', [App\Http\Controllers\DepartmentController::class, 'index']);
Route::get('/departamentos/create', [App\Http\Controllers\DepartmentController::class, 'create']);
Route::get('/departamentos/{department}/edit', [App\Http\Controllers\DepartmentController::class, 'edit']);
Route::post('/departamentos', [App\Http\Controllers\DepartmentController::class, 'sendData']);

Route::put('/departamentos/{department}', [App\Http\Controllers\DepartmentController::class, 'update']);

Route::delete('/departamentos/{department}', [App\Http\Controllers\DepartmentController::class, 'destroy']);

//Empleados
Route::resource('employees', App\Http\Controllers\EmployeeController::class)
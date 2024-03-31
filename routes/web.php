<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    //especialidades
    Route::get('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\Admin\SpecialtyController::class, 'sendData']);
    Route::put('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);
    Route::delete('/especialidades/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);

    //departamentos
    Route::get('/departamentos', [App\Http\Controllers\Admin\DepartmentController::class, 'index']);
    Route::get('/departamentos/create', [App\Http\Controllers\Admin\DepartmentController::class, 'create']);
    Route::get('/departamentos/{department}/edit', [App\Http\Controllers\Admin\DepartmentController::class, 'edit']);
    Route::post('/departamentos', [App\Http\Controllers\Admin\DepartmentController::class, 'sendData']);
    Route::put('/departamentos/{department}', [App\Http\Controllers\Admin\DepartmentController::class, 'update']);
    Route::delete('/departamentos/{department}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy']);

    //Empleados
    Route::resource('empleados', App\Http\Controllers\Admin\EmployeeController::class);

    //Clientes
    Route::resource('clientes', App\Http\Controllers\Admin\CustomerController::class);

    //Horarios Empleados
    Route::get('/horario', [App\Http\Controllers\Employee\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\Employee\HorarioController::class, 'store']);
    
});

//empleados
Route::middleware(['auth', 'empleado'])->group(function () {
    Route::get('/horarioVista', [App\Http\Controllers\Employee\HorarioController::class, 'edit2']);
});



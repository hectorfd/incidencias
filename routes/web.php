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


    //productos
    Route::get('/categorias', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/categorias/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::get('/categorias/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/categorias', [App\Http\Controllers\Admin\CategoryController::class, 'sendData']);
    Route::put('/categorias/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::delete('/categorias/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    //equipos
    Route::get('/equipos', [App\Http\Controllers\DeviceController::class, 'index']);
    Route::get('/equipos/create', [App\Http\Controllers\DeviceController::class, 'create']);
   
    Route::get('/equipos/{device}/edit', [App\Http\Controllers\DeviceController::class, 'edit']);
    Route::post('/equipos', [App\Http\Controllers\DeviceController::class, 'store']);
    Route::put('/equipos/{device}', [App\Http\Controllers\DeviceController::class, 'update']);
    Route::delete('/equipos/{device}', [App\Http\Controllers\DeviceController::class, 'destroy']);


});

//empleados
Route::middleware(['auth', 'empleado'])->group(function () {
    Route::get('/horarioVista', [App\Http\Controllers\Employee\HorarioController::class, 'edit2']);
    
    //incidencias
    Route::get('/incidencias', [App\Http\Controllers\Employee\IncidenciasController::class, 'index']);
    Route::get('/incidencias/create', [App\Http\Controllers\Employee\IncidenciasController::class, 'create']);
    Route::post('/incidencias', [App\Http\Controllers\Employee\IncidenciasController::class, 'store']);
    Route::get('/incidencias/{incident}/edit', [App\Http\Controllers\Employee\IncidenciasController::class, 'edit']);
    Route::put('/incidencias/{incident}', [App\Http\Controllers\Employee\IncidenciasController::class, 'update']);
    Route::delete('/incidencias/{incident}', [App\Http\Controllers\Employee\IncidenciasController::class, 'destroy']);

    //escalas
    Route::get('/escalas', [App\Http\Controllers\EscalaController::class, 'index']);
    Route::get('/escalas/create', [App\Http\Controllers\EscalaController::class, 'create']);
    Route::post('/escalas', [App\Http\Controllers\EscalaController::class, 'store']);
    Route::get('/escalas/{escala}/edit', [App\Http\Controllers\EscalaController::class, 'edit']);
    Route::put('/escalas/{escala}', [App\Http\Controllers\EscalaController::class, 'update']);
    Route::delete('/escalas/{escala}', [App\Http\Controllers\EscalaController::class, 'destroy']);
    Route::post('/escalas/{escala}/update-status', [App\Http\Controllers\EscalaController::class, 'updateStatus']);


    //equipos
    Route::get('/mis_equipos', [App\Http\Controllers\DeviceController::class, 'index']);
    Route::get('/mis_equipos/create', [App\Http\Controllers\DeviceController::class, 'create']);
    Route::get('/mis_equipos/{device}/edit', [App\Http\Controllers\DeviceController::class, 'edit']);
    Route::post('/mis_equipos', [App\Http\Controllers\DeviceController::class, 'store']);
    Route::put('/mis_equipos/{device}', [App\Http\Controllers\DeviceController::class, 'update']);
    Route::delete('/mis_equipos/{device}', [App\Http\Controllers\DeviceController::class, 'destroy']);

});


//clientes
Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/mis_incidencias', [App\Http\Controllers\Employee\IncidenciasController::class, 'index2']);
    Route::get('/mis_incidencias/{id}', [App\Http\Controllers\Employee\IncidenciasController::class, 'show']);
    Route::get('/mis_equipos2', [App\Http\Controllers\DeviceController::class, 'index2']);
});





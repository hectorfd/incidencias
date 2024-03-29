<?php 
use Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Empleado</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/empleados')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
       
        <div class="card-body">
            @if ($errors ->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!!</strong>{{$error}}
                    </div>
                @endforeach
            @else
                
            @endif
            <form action="{{url('/empleados/'.$empleado->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre del Empleado</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$empleado->name)}}">
                </div>

                <div class="form-group">
                    <label for="lastName">Apellido del Empleado</label>
                    <input type="text" name="lastName" class="form-control" value="{{old('lastName',$empleado->lastName)}}">
                </div>

                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email',$empleado->email)}}">
                </div>

                <div class="form-group">
                    <label for="dni">Documento de Identidad</label>
                    <input type="text" name="dni" class="form-control" value="{{old('dni',$empleado->dni)}}">
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{old('address',$empleado->address)}}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado del Empleado</label>
                    <input type="text" name="estado" class="form-control" value="{{old('estado',$empleado->estado)}}">
                </div>

                <div class="form-group">
                    <label for="phone">Telefono/celular</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone',$empleado->phone)}}">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control">
                    <small class="text-warning">solo llena este campo si deseas cambiar la contraseña</small>
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>

            </form>
        </div>
    </div>
@endsection
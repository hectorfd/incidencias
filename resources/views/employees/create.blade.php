@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Empleado</h3>
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
            <form action="{{url('/empleados')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del Empleado</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Apellido del Empleado</label>
                    <input type="text" name="lastName" class="form-control" value="{{old('lastName')}}">
                </div>

                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="dni">Documento de Identidad</label>
                    <input type="text" name="dni" class="form-control" value="{{old('dni')}}">
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado del Empleado</label>
                    <input type="text" name="estado" class="form-control" value="{{old('estado')}}">
                </div>

                <div class="form-group">
                    <label for="phone">Telefono/celular</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Crear Empleado</button>

            </form>
        </div>
    </div>
@endsection
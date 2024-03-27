@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Departamento</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/departamentos')}}" class="btn btn-sm btn-success">
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
            <form action="{{url('/departamentos')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del Departamento</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Crear Departamento</button>

            </form>
        </div>
    </div>
@endsection
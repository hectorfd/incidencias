@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Categoria</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/categorias')}}" class="btn btn-sm btn-success">
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
            <form action="{{url('/categorias/'.$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category">Nombre de la Categoria</label>
                    <input type="text" name="category" class="form-control" value="{{old('category',$category->category)}}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" value="{{old('description',$category->description)}}">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar Categoria</button>

            </form>
        </div>
    </div>
@endsection
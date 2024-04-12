@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Incidencia</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/incidencias')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar</a>
                </div>
            </div>
        </div>
       
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!!</strong> {{$error}}<br>
                    @endforeach
                </div>
            @endif

            <form action="{{url('/incidencias/'.$incident->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="ticket">Ticket</label>
                    <input type="text" name="ticket" class="form-control" value="{{old('ticket',$incident->ticket)}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="problem">Problema</label>
                    <input type="text" name="problem" class="form-control" value="{{old('problem',$incident->problem)}}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" class="form-control" rows="6">{{ old('description',$incident->description) }}</textarea>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="numero_boleta">Número de Boleta</label>
                        <input type="text" name="numero_boleta" class="form-control" value="{{ old('numero_boleta',$incident->numero_boleta)}}">
                    </div>
                    <div class="col-md-6">
                        <label for="fecha_boleta">Fecha de Boleta</label>
                        <input type="date" name="fecha_boleta" class="form-control" value="{{ old('fecha_boleta',$incident->fecha_boleta)}}">
                    </div>
                </div>

               

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select name="status" class="form-control">
                        <option value="resuelto" {{ $incident->status == 'resuelto' ? 'selected' : '' }}>resuelto</option>
                        <option value="pendiente" {{ $incident->status == 'pendiente' ? 'selected' : '' }}>pendiente</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select name="cliente" class="form-control">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $incident->cliente_id == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->name }} {{ $cliente->lastName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                 <div class="form-group">
                    <label for="empleado">Empleado</label>
                    <select name="empleado" class="form-control">
                        <option value="{{ $empleado->id }}">{{ $empleado->name }} {{ $empleado->lastName }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $incident->category == $categoria->category ? 'selected' : '' }}>
                                {{ $categoria->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                
                
                <button type="submit" class="btn btn-sm btn-primary">Guardar Incidencia</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva Incidencia</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/escalas')}}" class="btn btn-sm btn-success">
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

            <form action="{{ url('/escalas') }}" method="POST">
                @csrf
                <div class="form-group row">
                    
                    {{-- <div class="col-md-8">
                        <label for="ticket">Incidencia</label>
                        <select name="ticket" class="form-control">
                            @foreach($incidencias as $incidencia)
                                <option value="{{ $incidencia->id }}">{{ $incidencia->ticket }}|{{$incidencia->cliente->name}}|{{$incidencia->problem}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="col-md-8">
                        <label for="ticket">Incidencia</label>
                        <select name="ticket" class="form-control" > 
                            @foreach($incidencias as $incidencia)
                                <option value="{{ $incidencia->id }}" @if($incidencia->id == request()->input('incidencia_id')) selected @endif>
                                    {{ $incidencia->ticket }} | {{ $incidencia->cliente->name }} | {{ $incidencia->problem }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-8">
                        <label for="ticket">Incidencia</label>
                        <select name="ticket" class="form-control"> 
                            @foreach($incidencias as $incidencia)
                                <option value="{{ $incidencia->id }}" @if($incidencia->id == request()->input('incidencia_id')) selected @endif>
                                    {{ $incidencia->ticket }} | {{ $incidencia->cliente->name }} | {{ $incidencia->problem }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="col-md-4">
                        <label for="equipo">Equipo</label>
                        <select name="equipo" class="form-control">
                            @foreach($devices as $device)
                                <option value="{{ $device->id }}">{{ $device->producto }}|{{$device->cliente->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="empleado">Empleado</label>
                        <select name="empleado" class="form-control">
                            <option value="{{ $empleado->id }}">{{ $empleado->name }} {{ $empleado->lastName }}</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-6">
                        <label for="nombre">Nombre proceso</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"required>
                    </div> --}}
                    {{-- <div class="col-md-6">
                        <label for="nombre">Nombre proceso</label>
                        <select name="nombre" id="nombre" class="form-control" required>
                            <option value="Diagnostico">Diagnóstico</option>
                            <option value="Formateo">Formateo</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="Instalacion">Instalación</option>
                            <option value="Actualizacion">Actualización</option>
                            <option value="Actualizacion">Facturar</option>
                            <option value="Especificar">Especificar</option>
                        </select>
                    </div> --}}
                    <div class="col-md-6">
                        <label for="nombre">Nombre proceso</label>
                        <select name="nombre" id="nombre" class="form-control" required>
                            <option value="Diagnostico" data-precio="10">Diagnóstico</option>
                            <option value="Formateo" data-precio="50">Formateo</option>
                            <option value="Mantenimiento" data-precio="40">Mantenimiento</option>
                            <option value="Instalacion" data-precio="40">Instalación</option>
                            <option value="Actualizacion" data-precio="10">Actualización Antivirus</option>
                            <option value="Especificar" data-precio="0">Especificar</option>
                            <option value="Terminar" data-precio="0">Terminar</option>
                        </select>
                    </div>
                    
                    <div id="especificar" class="col-md-6" style="display: none;">
                        <label for="especificar">Especificar</label>
                        <input type="text" name="especificar" class="form-control">
                    </div>
                </div>

                <div class="form-group row">

                    
                    <div class="col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="6">{{ old('description') }}</textarea>
                    </div>

                </div>
                <div class="form-group row">
                    {{-- <div class="col-md-4">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control">
                            <option value="en progreso" {{ old('status') === 'en progreso' ? 'selected' : '' }}>En progreso</option>
                            <option value="terminado" {{ old('status') === 'terminado' ? 'selected' : '' }}>Terminado</option>
                            <option value="resuelto" {{ old('status') === 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                        </select>
                    </div> --}}
                    <div class="col-md-4">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="en progreso" {{ old('status') === 'en progreso' ? 'selected' : '' }}>En progreso</option>
                            <option value="terminado" {{ old('status') === 'terminado' ? 'selected' : '' }}>Terminado</option>
                            <option value="resuelto" {{ old('status') === 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="hora_inicio">Hora Inicio</label>
                        <input type="datetime-local" name="hora_inicio" class="form-control" value="{{ now('America/Lima')->format('Y-m-d\TH:i') }}" readonly>
                    </div>
                    
                    {{-- <div class="col-md-4">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
                    </div> --}}
                    <div class="col-md-4">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio',10) }}" required>
                    </div>
                    
                    
        
                    
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Crear Incidencia</button>
            </form>
        </div>
    </div>
@endsection

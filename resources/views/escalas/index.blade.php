@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Incidencias</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/escalas/create')}}" class="btn btn-sm btn-primary">Nueva Escala</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
                </div>
                
            @endif
        </div>
        <div class="table-responsive">
            
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Proceso</th>
                        <th scope="col">Ticket</th>
                        
                        <th scope="col" class="d-none d-md-table-cell">Estado</th>
                       
                        <th scope="col" class="d-none d-md-table-cell">Precio</th>
                        
                        <th scope="col" class="d-none d-md-table-cell">Fecha inicio</th>
                        <th scope="col" class="d-none d-lg-table-cell">Fin del proceso</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($escalas as $escala)
                        <tr>
                            <td>{{ $escala->nombre }}</td>
                            <td>{{ $escala->incidencia->ticket }}</td>
                            {{-- <td scope="row" class="d-none d-lg-table-cell">{{ $escala->description }}</td> --}}
                            <td scope="row" class="d-none d-lg-table-cell">
                                <form action="{{ url('/escalas/'.$escala->id.'/update-status') }}" method="POST">
                                    @csrf
                                    <select name="status" class="form-control btn-outline-success" onchange="this.form.submit()">
                                        <option value="en progreso" {{ $escala->status === 'en progreso' ? 'selected' : '' }}>En progreso</option>
                                        <option value="terminado" {{ $escala->status === 'terminado' ? 'selected' : '' }}>Terminado</option>
                                        <option value="resuelto" {{ $escala->status === 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                                    </select>
                                </form>
                            </td>
                            <td scope="row" class="d-none d-lg-table-cell">{{ $escala->precio }}</td>
                            <td scope="row" class="d-none d-lg-table-cell">{{ $escala->hora_inicio }}</td>
                            <td scope="row" class="d-none d-lg-table-cell">{{ $escala->hora_fin }}</td>
                            <td>
                                <form action="{{ url('/escalas/'.$escala->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/escalas/'.$escala->id.'/edit') }}" class="btn btn-sm btn-outline-info">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            
            </table>
        </div>
    </div>
@endsection
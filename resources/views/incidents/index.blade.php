@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Incidencias</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/incidencias/create')}}" class="btn btn-sm btn-primary">Nueva Incidencia</a>
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
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Ticket</th>
                        <th scope="col" class="d-none d-lg-table-cell">Problema</th>
                        
                        <th scope="col" class="d-none d-md-table-cell">Garantia</th>
                        <th scope="col" class="d-none d-md-table-cell">Estado</th>
                       
                        <th scope="col" class="d-none d-md-table-cell">Cliente</th>
                        <th scope="col" class="d-none d-lg-table-cell">Cactegoria</th>
                        <th scope="col">Opciones</th>
                        <th scope="col">Escalas</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $incidencia)
                    <tr>
                      
                        <td>{{$incidencia->ticket}}</td>
                        <td scope="row" class="d-none d-lg-table-cell">{{$incidencia->problem}}</td>
                        
                        
                        <th scope="row" class="d-none d-md-table-cell {{$incidencia->garantia == 'Con Garantía' ? 'badge badge-success' : ($incidencia->garantia == 'Sin Garantía' ? 'badge badge-warning' : 'badge badge-light')}}">{{$incidencia->garantia}}</th>

                        <td scope="row" class="d-none d-md-table-cell">{{$incidencia->status}}</td>
                        
                        <td scope="row" class="d-none d-md-table-cell">{{$incidencia->cliente->name}}</td>
                        
                        <td scope="row" class="d-none d-lg-table-cell">{{$incidencia->categoria->category}}</td>

                        <td>
                            <form action="{{ url('/incidencias/'.$incidencia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/incidencias/'.$incidencia->id.'/edit') }}" class="btn btn-sm btn-outline-info">Editar</a>
                                <button type="submit" class="btn btn-sm btn-danger" name="action" value="delete_incidencia">Eliminar</button>
                            </form>
                            
                            
                        </td>
                            <td> 
                            <form action="{{ url('/escalas/create') }}" method="GET">
                                @csrf
                                <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-success">Escalar</button>
                            </form>
                            
                            
                            
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            
            </table>
        </div>
    </div>
@endsection
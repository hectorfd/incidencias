@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Equipos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/equipos/create')}}" class="btn btn-sm btn-primary">Nuevo Equipo</a>
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
                        <th scope="col">Producto</th>
                        <th scope="col" class="d-none d-lg-table-cell">Marca</th>
                        
                        <th scope="col" class="d-none d-md-table-cell">Modelo</th>
                        <th scope="col" class="d-none d-md-table-cell">Serie</th>
                       
                        <th scope="col" class="d-none d-md-table-cell">Foto</th>
                        <th scope="col" class="d-none d-lg-table-cell">Cliente</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devices as $equipo)
                    <tr>
                      
                        <td>{{$equipo->producto}}</td>
                        <td scope="row" class="d-none d-lg-table-cell">{{$equipo->marca}}</td>
                        
                        
                        <th scope="row" class="d-none d-md-table-cell">{{$equipo->modelo}}</th>

                        <td scope="row" class="d-none d-md-table-cell">{{$equipo->serie}}</td>
                        <td scope="row" class="d-none d-md-table-cell">{{$equipo->foto}}</td>
                        
                        <td scope="row" class="d-none d-md-table-cell">{{$equipo->cliente->name}}</td>
                        
                        

                        <td>
                            <form action="{{url('/equipos/'.$equipo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('/equipos/'.$equipo->id.'/edit')}}" class="btn btn-sm btn-outline-info">Editar</a>
                                <button type="submit" href="" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            
            </table>
        </div>
    </div>
@endsection
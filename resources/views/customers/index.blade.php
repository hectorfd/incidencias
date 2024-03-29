@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Clientes</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/clientes/create')}}" class="btn btn-sm btn-primary">Nuevo Cliente</a>
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
                        <th scope="col">Nombre</th>
                        <th scope="col" class="d-none d-md-table-cell">Apellido</th>
                        <th scope="col" class="d-none d-xl-table-cell">Correo</th>
                        <th scope="col" class="d-none d-md-table-cell">DNI</th>
                        
                        <th scope="col" class="d-none d-md-table-cell">Estado</th>
                        <th scope="col" class="d-none d-md-table-cell">Telefono</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $customers as $cliente )
                    <tr>
                        <th scope="row" >
                            {{$cliente->name}}
                        </th>
                        {{-- <td class="d-none d-md-table-cell">
                            <textarea name="" id="" cols="50%" rows="3%" class="form-control border-0 resize-none">{{$especialidad->description}}</textarea>
                            
                        </td> --}}
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$cliente->lastName}}
                        </th>
                        <th scope="row" class="d-none d-xl-table-cell">
                            {{$cliente->email}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$cliente->dni}}
                        </th>
                        
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$cliente->estado}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$cliente->phone}}
                        </th>
                        
                        <td>
                            
                            <form action="{{url('/clientes/'.$cliente->id)}}" method="POST">
                             
                                @csrf
                                @method( 'DELETE' )
                                <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-sm btn-outline-info">Editar</a>
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




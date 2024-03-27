@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Empleados</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/especialidades/create')}}" class="btn btn-sm btn-primary">Nuevo Empleado</a>
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
                        <th scope="col" class="d-none d-md-table-cell">Correo</th>
                        <th scope="col" class="d-none d-md-table-cell">DNI</th>
                        <th scope="col" class="d-none d-md-table-cell">Dirección</th>
                        <th scope="col" class="d-none d-md-table-cell">Estado</th>
                        <th scope="col" class="d-none d-md-table-cell">Telefono</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $employees as $empleado )
                    <tr>
                        <th scope="row" >
                            {{$empleado->name}}
                        </th>
                        {{-- <td class="d-none d-md-table-cell">
                            <textarea name="" id="" cols="50%" rows="3%" class="form-control border-0 resize-none">{{$especialidad->description}}</textarea>
                            
                        </td> --}}
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->lastName}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->email}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->dni}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->address}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->estado}}
                        </th>
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$empleado->phone}}
                        </th>
                        
                        <td>
                            
                            <form action="{{url('/empleados/'.$empleado->id)}}" method="POST">
                             
                                @csrf
                                @method( 'DELETE' )
                                <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="btn btn-sm btn-teal">Editar</a>
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
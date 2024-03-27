@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Especialidades</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/especialidades/create')}}" class="btn btn-sm btn-primary">Nueva Especialidad</a>
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
                        <th scope="col" class="d-none d-md-table-cell">Descripcion</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $specialties as $especialidad )
                    <tr>
                        <th scope="row" >
                            {{$especialidad->name}}
                        </th>
                        {{-- <td class="d-none d-md-table-cell">
                            <textarea name="" id="" cols="50%" rows="3%" class="form-control border-0 resize-none">{{$especialidad->description}}</textarea>
                            
                        </td> --}}
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$especialidad->description}}
                        </th>
                        
                        <td>
                            
                            <form action="{{url('/especialidades/'.$especialidad->id)}}" method="POST">
                             
                                @csrf
                                @method( 'DELETE' )
                                <a href="{{url('/especialidades/'.$especialidad->id.'/edit')}}" class="btn btn-sm btn-teal">Editar</a>
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
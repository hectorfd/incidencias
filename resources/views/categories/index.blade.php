@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Categorias</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/categorias/create')}}" class="btn btn-sm btn-primary">Nueva Categoria</a>
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
                        <th scope="col">Categoria</th>
                        <th scope="col" class="d-none d-md-table-cell">Descripción</th>
                        <th scope="col">Opciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $categoria )
                    <tr>
                        <th scope="row" >
                            {{$categoria->category}}
                        </th>
                        {{-- <td class="d-none d-md-table-cell">
                            <textarea name="" id="" cols="50%" rows="3%" class="form-control border-0 resize-none">{{$especialidad->description}}</textarea>
                            
                        </td> --}}
                        <th scope="row" class="d-none d-md-table-cell">
                            {{$categoria->description}}
                        </th>
                        
                        <td>
                            
                            <form action="{{url('/categorias/'.$categoria->id)}}" method="POST">
                             
                                @csrf
                                @method( 'DELETE' )
                                <a href="{{url('/categorias/'.$categoria->id.'/edit')}}" class="btn btn-sm btn-outline-info">Editar</a>
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
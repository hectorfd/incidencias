@extends('layouts.panel')

@section('content')

<style>

.custom-file-input {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none;
}

.custom-file-button {
    margin-left: -1px; 
} 

</style>
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Equipo</h3>
                </div>
                
                <div class="col text-right">
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ url('/equipos') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-chevron-left"></i> Regresar
                        </a>
                    @elseif(auth()->user()->role === 'empleado')
                        <a href="{{ url('/mis_equipos') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-chevron-left"></i> Regresar
                        </a>
                    @endif
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

            {{-- <form action="{{ url('/equipos') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ auth()->user()->role === 'admin' ? url('/equipos') : url('/mis_equipos') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="producto">Producto</label>
                            <input type="text" name="producto" class="form-control" value="{{ old('producto') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="marca">Marca</label>
                            <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label for="modelo">Modelo</label>
                            <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="serie">Serie</label>
                            <input type="text" name="serie" class="form-control" value="{{ old('serie') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="cliente">Cliente</label>
                            <select name="cliente" class="form-control">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->name }} {{ $cliente->lastName }}</option>
                                @endforeach
                            </select>
                        </div>     
                              
                        <div class="col-md-4">
                            <label for="foto">Foto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile" onchange="updateFileName(this)">
                                <label class="custom-file-label" for="customFile" id="customFileLabel">Seleccionar archivo</label>
                            </div>
                            <small id="fileHelp" class="form-text text-muted">Por favor, seleccione una imagen en formato JPEG, PNG, JPG o GIF.</small>
                        </div>

                        {{-- <div class="col-md-4">
                            <label for="foto">Foto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile" onchange="previewImage(this)">
                                <label class="custom-file-label" for="customFile" id="customFileLabel">Seleccionar archivo</label>
                            </div>
                            <img id="imagePreview" class="mt-2" style="max-width: 100%;" src="#" alt="Vista previa de la imagen">
                            <small id="fileHelp" class="form-text text-muted">Por favor, seleccione una imagen en formato JPEG, PNG, JPG o GIF.</small>
                        </div> --}}
                        
                    </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="description">Descripción</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>
                    </div>
                <button type="submit" class="btn btn-sm btn-primary">Crear Equipo</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.panel')

@section('content')

<style>
    /* Estilos adicionales */
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fc;
    }

    .card {
        margin-top: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f0f3f5;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-header h3 {
        margin-bottom: 0;
        font-size: 1.25rem;
    } */

    .card-body {
        padding: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
    }

    .table th,
    .table td {
        padding: 8px;
        border-bottom: 1px solid #dee2e6;
        text-align: center;
    }

    .table th {
        background-color: #f0f3f5;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fc;
    }

    .custom-toggle-slider {
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .form-group {
        margin-bottom: 20px;
    }

    select.form-control {
        width: 100%;
        padding: .375rem .75rem;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        background-color: #fff;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .custom-toggle-slider {
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .rounded-circle {
        border-radius: 50%;
    }
    /* Estilos para el día Lunes */
.lunes {
    color: white;
    background-color: #FF5733 !important; /* Color de fondo */
}

/* Estilos para el día Martes */
.martes {
    color: white;
    background-color: #FFBD33 !important; /* Color de fondo */
}

/* Estilos para el día Miércoles */
.miércoles {
    color: white;
    background-color: #00FF60 !important; /* Color de fondo */
}

/* Estilos para el día Jueves */
.jueves {
    color: white;
    background-color: #33A2FF !important; /* Color de fondo */
}

/* Estilos para el día Viernes */
.viernes {
    color: white;
    background-color: #B533FF !important; /* Color de fondo */
}

/* Estilos para el día Sábado */
.sábado {
    color: white;
    background-color: #FF3380 !important; /* Color de fondo */
}

/* Estilos para el día Domingo */
.domingo {
    color: white;
    background-color: #FF3333 !important; /* Color de fondo */
}

</style>

    <form action="{{ url('/horario') }}" method="POST">
        @csrf 
        

        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mi Horario</h3>
                    </div>
                   
                </div>
            </div>



           

            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Día</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Turno mañana</th>
                            <th scope="col">Turno tarde</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $key => $horario)
                            <tr>
                                
                                    
                                        <th scope="col" class="{{ strtolower($days[$key]) }}">{{ $days[$key] }}</th>
                                        <!-- Resto del encabezado de la tabla -->
                                 
                                
                                {{-- <th>{{ $days[$key] }}</th> --}}
                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox" name="active[]" value="{{ $key }}" 
                                        @if($horario->active) checked @endif
                                        @if($key === 0 || $horario->active) checked @endif
                                        disabled>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                      </label>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="morning_start[]" disabled>
                                                @for ($i=8; $i<=11; $i++)
                                                    <option value="{{ ($i<10 ? '0' : '') . $i }}:00"
                                                    @if($i.':00 AM' == $horario->morning_start) selected @endif>
                                                    {{ $i }}:00 AM</option>
                                                    <option value="{{ ($i<10 ? '0' : '') . $i }}:30" 
                                                    @if($i.':30 AM' == $horario->morning_start) selected @endif>
                                                    {{ $i }}:30 AM</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="morning_end[]" disabled>
                                                @php
                                                    $activeTime = $horario->morning_end ? date('H:i', strtotime($horario->morning_end)) : '';
                                                @endphp
                                            
                                                @for ($i = 8; $i <= 13; $i++)
                                                    @for ($j = 0; $j <= 1; $j++)
                                                        @php
                                                            $time = ($i < 10 ? '0' . $i : $i) . ':' . ($j == 0 ? '00' : '30');
                                                            $selected = ($activeTime == $time) ? 'selected' : '';
                                                        @endphp
                                                        <option value="{{ $time }}" {{ $selected }}>
                                                            {{ $i == 13 ? 1 : $i }}:{{ $j == 0 ? '00' : '30' }} {{ $i < 12 ? 'AM' : 'PM' }}
                                                        </option>
                                                    @endfor
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="afternoon_start[]"disabled>
                                                @for ($i=2; $i<=11; $i++)
                                                    <option value="{{ $i+12 }}:00"
                                                    @if($i.':00 PM' == $horario->afternoon_start) selected @endif>
                                                    {{ $i }}:00 PM</option>
                                                    <option value="{{ $i+12 }}:30"
                                                    @if($i.':30 PM' == $horario->afternoon_start) selected @endif>
                                                    {{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="afternoon_end[]" disabled>
                                                @for ($i=2; $i<=11; $i++)
                                                    <option value="{{ $i+12 }}:00" 
                                                    @if($i.':00 PM' == $horario->afternoon_end) selected @endif>
                                                    {{ $i }}:00 PM</option>
                                                    <option value="{{ $i+12 }}:30"
                                                    @if($i.':30 PM' == $horario->afternoon_end) selected @endif>
                                                    {{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>            

        </div>
    </form>

        
    
@endsection
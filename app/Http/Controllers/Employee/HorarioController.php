<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horarios;
use Carbon\Carbon;
use App\Models\User;

class HorarioController extends Controller
{
    public function edit2(Request $request){

        $horarios = Horarios::where('user_id', auth()->id())->get();

        if(count($horarios) > 0){
            $horarios->map(function($horarios){
                $horarios->morning_start = (new Carbon($horarios->morning_start))->format('g:i A');
                $horarios->morning_end = (new Carbon($horarios->morning_end))->format('g:i A');
                $horarios->afternoon_start = (new Carbon($horarios->afternoon_start))->format('g:i A');
                $horarios->afternoon_end = (new Carbon($horarios->afternoon_end))->format('g:i A');
            });
        }else {
            $horarios = collect();
            for ($i=0; $i<7; ++$i)
                $horarios->push(new Horarios());
        }

        

        $days = $this->days;

        return view('horarioVista', compact('days', 'horarios')); 
    }
    private $days = [
        'Lunes', 'Martes', 'Miércoles', 'Jueves',
        'Viernes', 'Sábado', 'Domingo'
    ];
    public function edit(Request $request){

        $empleados = User::where('role', 'empleado')->get();
        $selectedUserIds = $request->input('empleados'); // Obtener los IDs de los usuarios seleccionados
    
        // Si se han seleccionado usuarios, filtrar los horarios por esos usuarios
        if ($selectedUserIds) {
            $horarios = Horarios::whereIn('user_id', $selectedUserIds)->get();
        } else {
            // Si no se ha seleccionado ningún usuario, mostrar los horarios del usuario autenticado
            $horarios = Horarios::where('user_id', auth()->id())->get();
        }
    
        if(count($horarios) > 0){
            $horarios->map(function($horario){
                $horario->morning_start = (new Carbon($horario->morning_start))->format('g:i A');
                $horario->morning_end = (new Carbon($horario->morning_end))->format('g:i A');
                $horario->afternoon_start = (new Carbon($horario->afternoon_start))->format('g:i A');
                $horario->afternoon_end = (new Carbon($horario->afternoon_end))->format('g:i A');
            });
        } else {
            $horarios = collect();
            for ($i=0; $i<7; ++$i)
                $horarios->push(new Horarios());
        }
    
        $days = $this->days;
    
        return view('horario', compact('days', 'horarios', 'empleados'));
    }
  
   
    public function store(Request $request){

        $action = $request->input('action');

        // Si la acción es "Cargar horario", llama al método "load"
        if ($action == 'load') {
            return $this->load($request);
        }
    
        // Si la acción es "Guardar cambios", llama al método "save"
        if ($action == 'save') {
            // Validar que 'active' esté presente en la solicitud
            $request->validate([
                'active' => 'required|array',
            ]);
    
            return $this->save($request);
        }
       
    }
    
    public function save(Request $request){
        // Validar que 'active' esté presente en la solicitud y no sea nulo
        $request->validate([
            'active' => 'required|array',
        ]);
    
        // Obtener los IDs de los empleados seleccionados
        $empleadosSeleccionados = $request->input('empleados') ?: [];
    
        // Iterar sobre los empleados seleccionados y guardar los horarios asociados
        foreach ($empleadosSeleccionados as $empleadoId) {
            for ($i = 0; $i < 7; ++$i) {
                Horarios::updateOrCreate(
                    [
                        'day' => $i,
                        'user_id' => $empleadoId,
                    ],
                    [
                        // Asignar los valores de los horarios desde el formulario
                        'active' => $request->input('active.' . $i) ? 1 : 0, // Convertir a entero
                        'morning_start' => $request->input('morning_start.' . $i),
                        'morning_end' => $request->input('morning_end.' . $i),
                        'afternoon_start' => $request->input('afternoon_start.' . $i),
                        'afternoon_end' => $request->input('afternoon_end.' . $i),
                    ]
                );
            }
        }
    
        // Redirigir de regreso a la vista con una notificación
        return back()->with('notification', 'Los horarios se han guardado correctamente.');
    }
    
    
    public function load(Request $request){
        $selectedUserIds = $request->input('empleados'); // Obtener los IDs de los usuarios seleccionados
    
        // Obtener los horarios de los usuarios seleccionados
        $horarios = Horarios::whereIn('user_id', $selectedUserIds)->get();
    
        // Formatear los horarios
        if(count($horarios) > 0){
            $horarios->map(function($horario){
                $horario->morning_start = (new Carbon($horario->morning_start))->format('g:i A');
                $horario->morning_end = (new Carbon($horario->morning_end))->format('g:i A');
                $horario->afternoon_start = (new Carbon($horario->afternoon_start))->format('g:i A');
                $horario->afternoon_end = (new Carbon($horario->afternoon_end))->format('g:i A');
            });
        } else {
            $horarios = collect();
            for ($i=0; $i<7; ++$i)
                $horarios->push(new Horarios());
        }
    
        // Obtener los días
        $days = [
            'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'
        ];
    
        // Obtener la lista de empleados
        $empleados = User::whereIn('id', $selectedUserIds)->get();

        // return $horarios;
    
        // return view('horario', compact('days', 'horarios', 'empleados'));
        return view('horario', compact('days', 'horarios', 'empleados', 'selectedUserIds'));

    }
    
   

}

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
        $selectedUserIds = $request->input('empleados'); 
    
        
        if ($selectedUserIds) {
            $horarios = Horarios::whereIn('user_id', $selectedUserIds)->get();
        } else {
            
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

        
        if ($action == 'load') {
            return $this->load($request);
        }
    
        
        if ($action == 'save') {
            
            $request->validate([
                'active' => 'required|array',
            ]);
    
            return $this->save($request);
        }
       
    }
    
    public function save(Request $request){
        
        $request->validate([
            'active' => 'required|array',
        ]);
    
        
        $empleadosSeleccionados = $request->input('empleados') ?: [];
    
        
        foreach ($empleadosSeleccionados as $empleadoId) {
            for ($i = 0; $i < 7; ++$i) {
                Horarios::updateOrCreate(
                    [
                        'day' => $i,
                        'user_id' => $empleadoId,
                    ],
                    [
                        
                        'active' => $request->input('active.' . $i) ? 1 : 0, 
                        'morning_start' => $request->input('morning_start.' . $i),
                        'morning_end' => $request->input('morning_end.' . $i),
                        'afternoon_start' => $request->input('afternoon_start.' . $i),
                        'afternoon_end' => $request->input('afternoon_end.' . $i),
                    ]
                );
            }
        }
    
        
        return back()->with('notification', 'Los horarios se han guardado correctamente.');
    }
    
    
    public function load(Request $request){
        $selectedUserIds = $request->input('empleados'); 
    
        
        $horarios = Horarios::whereIn('user_id', $selectedUserIds)->get();
    
        
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

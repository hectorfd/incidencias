<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use App\Models\Incidencias;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class EscalaController extends Controller
{
    public function index()
    {
        $escalas = Escala::all();
        $incidencias = Incidencias::all();
        return view('escalas.index',compact('escalas','incidencias'));
    }

    public function create()
    {
        
        $empleado = Auth::user();
        $incidencias = Incidencias::all();
        $devices = Device::all();
        return view('escalas.create',compact('empleado','incidencias','devices'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'ticket' => 'required|exists:incidencias,id',
            
            'equipo' => 'required|exists:devices,id',
            'empleado' => 'required|exists:users,id',
            'nombre' => 'required',
            'description' => 'required',
            'estado' => 'required|in:en progreso,terminado,resuelto',
            'precio' => 'required|numeric',
        ]);
        

        $escala = new Escala();
        $escala->incidencia_id = $request->ticket;
        $escala->equipo_id = $request->equipo;
        $escala->empleado_id = $request->empleado;
        $escala->nombre = $request->nombre;
        $escala->description = $request->description;
        $escala->status = $request->estado;
        $escala->hora_inicio = $request->hora_inicio;
        $escala->precio = $request->precio; 
        
        
        $escala->save();        
        return redirect('/escalas')->with('success', '¡La escala se ha creado correctamente!');
    }

    public function edit(Escala $escala) {

        $escalas = Escala::all();
        $incidencias = Incidencias::all();
        $clientes = User::where('role', 'cliente')->get();
        

        return view('escalas.edit',compact('escalas','incidencias'));

    }

   

    public function updateStatus(Request $request, Escala $escala)
    {
        $request->validate([
            'status' => 'required|in:en progreso,terminado,resuelto',
        ]);
    
        $escala->status = $request->status;
        if ($request->status === 'terminado' || $request->status === 'resuelto') {
            $escala->hora_fin = Carbon::now(); 
        }
        $escala->save();
    
        return redirect('/escalas')->with('success', 'Estado actualizado exitosamente');
    }
    


}

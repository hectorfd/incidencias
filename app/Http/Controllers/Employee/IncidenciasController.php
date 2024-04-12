<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Incidencias;
use Illuminate\Support\Str;
use Carbon\Carbon;

class IncidenciasController extends Controller
{
    
    public function __construct() {
        $this ->middleware('auth');
    }


public function index()
{
    // $incidents = Incidencias::with(['cliente', 'empleado', 'categoria'])->get();

    // $incidents = Incidencias::all();

    $user = Auth::user();

    // Obtener las incidencias asociadas al usuario autenticado
    $incidents = Incidencias::where('empleado_id', $user->id)
        ->with(['cliente', 'empleado', 'categoria'])
        ->get();

    // Lógica de garantía...
    $fechaActual = Carbon::now();

    foreach ($incidents as $incidencia) {
        
        $diferenciaFechas = $fechaActual->diffInYears($incidencia->fecha_boleta);

        if (!empty($incidencia->fecha_boleta)) {
            $diferenciaFechas = $fechaActual->diffInYears($incidencia->fecha_boleta);

            if ($diferenciaFechas < 1) {
                $incidencia->garantia = "Con Garantía";
            } else {
                $incidencia->garantia = "Sin Garantía";
            }
        } else {
            
            $incidencia->garantia = "Sin Fecha";
        }
    }
    return view('incidents.index', compact('incidents'));

    
}




    //crear
    public function create()
    {
        $empleado = Auth::user();
        $clientes = User::where('role', 'cliente')->get();
        $categorias = Category::orderBy('category')->get();

        $ticket = null;
        do {
            
            $ticket = 'IN-' . strtoupper(Str::random(6)); 
        } while (Incidencias::where('ticket', $ticket)->exists());

        return view('incidents.create',compact('clientes','empleado','categorias','ticket'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'ticket' => 'required|string',
            'problem' => 'required|string',
            'description' => 'required|string',
            'numero_boleta' => 'nullable|string',
            'fecha_boleta' => 'nullable|date',
            'categoria' => 'required|exists:categories,id',
            'cliente' => 'required|exists:users,id',
        ]);

        // Crear la incidencia
        $incidencia = new Incidencias();
        $incidencia->ticket = $request->ticket;
        $incidencia->problem = $request->problem;
        $incidencia->description = $request->description;
        $incidencia->numero_boleta = $request->numero_boleta;
        $incidencia->fecha_boleta = $request->fecha_boleta;
        $incidencia->status = 'pendiente'; 
        $incidencia->empleado_id = Auth::id(); 
        $incidencia->cliente_id = $request->cliente;
        $incidencia->categoria_id = $request->categoria;

        $incidencia->save();

        return redirect('/incidencias')->with('success', 'La incidencia ha sido creada exitosamente.');
    }

    //mostrar datos

    public function edit(Incidencias $incident) {

        $empleado = Auth::user();
        $clientes = User::where('role', 'cliente')->get();
        $categorias = Category::orderBy('category')->get();
        return view('incidents.edit', compact('incident','clientes','empleado','categorias'));

    }

    public function update(Request $request, $id)
    {
        // Validación de los campos del formulario
        $request->validate([
            'ticket' => 'required|string',
            'problem' => 'required|string',
            'description' => 'required|string',
            'numero_boleta' => 'nullable|string',
            'fecha_boleta' => 'nullable|date',
            'categoria' => 'required|exists:categories,id',
            'cliente' => 'required|exists:users,id',
        ]);
    
        // Obtener la incidencia a actualizar
        $incidencia = Incidencias::findOrFail($id);
    
        // Actualizar los datos de la incidencia con los datos del formulario
        $incidencia->ticket = $request->input('ticket');
        $incidencia->problem = $request->input('problem');
        $incidencia->description = $request->input('description');
        $incidencia->numero_boleta = $request->input('numero_boleta');
        $incidencia->fecha_boleta = $request->input('fecha_boleta');
        $incidencia->status = $request->input('status');
        $incidencia->cliente_id = $request->input('cliente');
        $incidencia->empleado_id = $request->input('empleado');
        $incidencia->categoria_id = $request->input('categoria');
    
        // Guardar los cambios en la base de datos
        $incidencia->save();
    
        // Redirigir a la vista de detalles de la incidencia o a donde desees
        return redirect('/incidencias')->with('success', 'La incidencia ha actualizado exitosamente.');
    }
    
    public function destroy($id)
    {
        // Obtener la incidencia a eliminar
        $incidencia = Incidencias::findOrFail($id);

        // Eliminar la incidencia
        $incidencia->delete();

        // Redirigir a la página de incidencias o a donde desees después de eliminar
        return redirect('/incidencias')->with('success', '¡La incidencia se eliminó correctamente!');
    }


}

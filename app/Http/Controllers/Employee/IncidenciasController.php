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

    //indexuse App\Models\Incidencias;

    // public function index()
    // {
        
    //     $incidents = Incidencias::all();

    //     $empleado = Auth::user();
    //     $cliente = User::where('role', 'cliente')->get();
    //     $categorias = Category::orderBy('category')->get();

    //     // Modificar la lógica de la garantía esto no lo toques para nada 
    //     foreach ($incidents as $incidencia) {
    //         $fechaBoleta = Carbon::parse($incidencia->fecha_boleta);
    //         $diasDiferencia = $fechaBoleta->diffInDays(Carbon::now());

    //         if ($diasDiferencia > 365) {
    //             $incidencia->garantia = 'Sin garantía';
    //         } elseif ($diasDiferencia > 180) {
    //             $incidencia->garantia = 'Garantía limitada';
    //         } else {
    //             $incidencia->garantia = 'Con garantía';
    //         }
    //     }

    //     return view('incidents.index', compact('incidents', 'empleado', 'cliente', 'categorias'));
    // }


//     public function index()
// {
//     $incidents = Incidencias::all();

//     $empleado = Auth::user();
//     $cliente = User::where('role', 'cliente')->get();
//     $categorias = Category::orderBy('category')->get();

//     foreach ($incidents as $incidencia) {
//         $fechaBoleta = Carbon::parse($incidencia->fecha_boleta);
//         $diasDiferencia = $fechaBoleta->diffInDays(Carbon::now());

//         if ($diasDiferencia > 365) {
//             $incidencia->garantia = 'Sin garantía';
//         } elseif ($diasDiferencia > 180) {
//             $incidencia->garantia = 'Garantía limitada';
//         } else {
//             $incidencia->garantia = 'Con garantía';
//         }
//     }

//     return view('incidents.index', compact('incidents', 'empleado', 'cliente', 'categorias'));
// }


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

    // Recorrer cada incidencia para determinar si tiene garantía
    foreach ($incidents as $incidencia) {
        // Calcular la diferencia de fechas en años
        $diferenciaFechas = $fechaActual->diffInYears($incidencia->fecha_boleta);

        // Si la diferencia de fechas es menor a 1 año, tiene garantía
        if ($diferenciaFechas < 1) {
            $incidencia->garantia = "Con Garantía";
        } else {
            $incidencia->garantia = "Sin Garantía";
        }
    }
    return view('incidents.index', compact('incidents'));

    // return view('incidents.index', compact('incidents'));
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



}

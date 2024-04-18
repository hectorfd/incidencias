<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DeviceController extends Controller
{
    public function __construct() {
        $this ->middleware('auth');
    }
    public function index(){
        $devices = Device::all();
        return view('devices.index',compact('devices'));
    }

    public function index2(){
        
        $user = Auth::user();
        $clientes = User::where('role', 'cliente')->get();
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }
    

    //crear
    public function create()
    {
        $devices = Device::all();
        $clientes = User::where('role', 'cliente')->get();
        

        return view('devices.create',compact('clientes','devices'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'producto' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serie' => 'nullable|string',
            'cliente' => 'required|exists:users,id',
            'foto' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        
        if ($request->hasFile('foto')) {
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $fotoName);
        }

       
        $device = new Device();
        $device->producto = $request->producto;
        $device->marca = $request->marca;
        $device->modelo = $request->modelo;
        $device->serie = $request->serie;
        $device->cliente_id = $request->cliente;
        $device->foto = $fotoName; 
        $device->description = $request->description;
        $device->save();

        return redirect('/equipos')->with('success', 'El equipo ha sido creado exitosamente.');
    }


    public function edit(Device $device) {

        $devices = Device::all();
        $clientes = User::where('role', 'cliente')->get();
        

        return view('devices.edit',compact('clientes','device'));

    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'producto' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'serie' => 'nullable|string',
            'cliente' => 'required|exists:users,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        
        $device = Device::findOrFail($id);

        
        if ($request->hasFile('foto')) {
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $fotoName);
            
            if ($device->foto) {
                unlink(public_path('uploads/'.$device->foto));
            }
            $device->foto = $fotoName;
        }

        
        $device->producto = $request->producto;
        $device->marca = $request->marca;
        $device->modelo = $request->modelo;
        $device->serie = $request->serie;
        $device->cliente_id = $request->cliente;
        $device->description = $request->description;
        $device->save();

        return redirect('/equipos')->with('success', 'El equipo ha sido actualizado exitosamente.');
    }

    public function destroy($id)
    {
    
        $device = Device::findOrFail($id);

        
        if ($device->foto) {
            unlink(public_path('uploads/'.$device->foto));
        }

        
        $device->delete();

        return redirect('/equipos')->with('success', 'El equipo ha sido eliminado exitosamente.');
    }



}

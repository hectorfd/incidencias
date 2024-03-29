<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::employees()->get();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:8',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'dni.required' => 'El dni es obligatorio',
            'dni.digits' => 'El dni debe de tener 8 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name','lastName','email','dni','estado','address','phone') + [
                'role' => 'empleado',
                'password' => bcrypt($request->input('password'))
            ]
        );

        
       

        $notification = 'El empleado se ha registrado correctamente.';
        return redirect('/empleados')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = User::employees()->findOrFail($id);
        
        // $employees = Employee::all();
        // $employee_ids = $empleado->employees()->pluck('employees.id');
        return view('employees.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'required|digits:8',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'dni.required' => 'El dni es obligatorio',
            'dni.digits' => 'El dni debe de tener 8 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        // Búsqueda del usuario existente
        $user = User::employees()->findOrFail($id);
        $data = $request->only('name','lastName','email','dni','estado','address','phone');
        $password = $request->input('password');

        if ($password) {
            $data['password']=bcrypt($password);
        }
        $user -> fill($data);
        $user -> save();

        // Redirección con mensaje de notificación
        $notification = 'El empleado se actualizó correctamente.';
        return redirect('/empleados')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::employees()->findOrFail($id);
        $empleadoName = $user->name;
        $user->delete();

        $notification = "El empleado $empleadoName se elimino correctamente";

        return redirect('/empleados')->with(compact('notification'));
    }
}

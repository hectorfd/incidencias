<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::customers()->paginate(10);
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe tener más de 3 caracteres',
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
                'role' => 'cliente',
                'password' => bcrypt($request->input('password'))
            ]
        );


        $notification = 'El cliente se ha registrado correctamente.';
        return redirect('/clientes')->with(compact('notification'));
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
        $cliente = User::customers()->findOrFail($id);
        
        return view('customers.edit', compact('cliente'));
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
            'name.required' => 'El nombre del cliente es obligatorio',
            'name.min' => 'El nombre del cliente debe tener más de 3 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingresa una dirección de correo electrónico válido',
            'dni.required' => 'El dni es obligatorio',
            'dni.digits' => 'El dni debe de tener 8 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
            'phone.required' => 'El número de teléfono es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        // Búsqueda del usuario existente
        $user = User::customers()->findOrFail($id);
        $data = $request->only('name','lastName','email','dni','estado','address','phone');
        $password = $request->input('password');

        if ($password) {
            $data['password']=bcrypt($password);
        }
        $user -> fill($data);
        $user -> save();

        // Redirección con mensaje de notificación
        $notification = 'El cliente se actualizó correctamente.';
        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::customers()->findOrFail($id);
        $clienteName = $user->name;
        $user->delete();

        $notification = "El empleado $clienteName se elimino correctamente";

        return redirect('/clientes')->with(compact('notification'));
    }
}

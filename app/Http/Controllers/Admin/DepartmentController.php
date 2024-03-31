<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\Controller;
class DepartmentController extends Controller
{
    public function __construct() {
        $this ->middleware('auth');
    }
    public function index(){
        $departments = Department::all();
        return view('departments.index',compact('departments'));
    }
    public function create(){
        return view('departments.create');
    }

    public function sendData(Request $request){
        $rules = [
            'name'=> 'required|min:3'
        ];
        $message=[
            'name.required'=> 'El nombre del departamento es obligatorio.',
            'name.min' => 'El nombre del departamento debe tener mas de 3 caracteres.'
        ];

        $this->validate($request,$rules,$message);
        $department = new Department();
        $department->name= $request->input('name');
        $department->address= $request->input('address');
        $department->save();
        $notification = 'El departamento se ha creado correctamente.';

        return redirect('/departamentos')->with(compact('notification'));
    }
    public function edit(Department $department) {
        return view('departments.edit', compact('department') );

    }

    public function update(Request $request,Department $department){
        $rules = [
            'name'=> 'required|min:3'
        ];
        $message=[
            'name.required'=> 'El nombre del departamento es obligatorio.',
            'name.min' => 'El nombre del departamento debe tener mas de 3 caracteres.'
        ];

        $this->validate($request,$rules,$message);

        $department->name= $request->input('name');
        $department->address= $request->input('address');
        $department->save();
        $notification = 'El Departamento se ha actualizado correctamente.';

        return redirect('/departamentos')->with(compact('notification'));
    }


    public function destroy(Department $department){
        $deleteName = $department->name;
        $department->delete();
        $notification = 'El Departamento '.$deleteName.' se ha eliminado correctamente.';
        return redirect('/departamentos')->with(compact( 'notification')) ;
    }


}

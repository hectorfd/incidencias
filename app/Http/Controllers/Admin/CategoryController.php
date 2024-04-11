<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{
    public function __construct() {
        $this ->middleware('auth');
    }
    public function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }
    public function create(){
        return view('categories.create');
    }
    //visualizar datos
    public function show($id){
        $category= Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }
    
    public function sendData(Request $request){
        $rules = [
            'category'=> 'required|min:3'
        ];
        $message=[
            'category.required'=> 'El nombre de la categoría es obligatorio.',
            'category.min' => 'El nombre de la categoría debe tener mas de 3 caracteres.'
        ];

        $this->validate($request,$rules,$message);
        $category = new Category();
        $category->category= $request->input('category');
        $category->description= $request->input('description');
        $category->save();
        $notification = 'La categoría se ha creado correctamente.';

        return redirect('/categorias')->with(compact('notification'));
    }
    public function edit(Category $category) {
        return view('categories.edit', compact('category') );

    }


    public function update(Request $request,Category $category){
        $rules = [
            'category'=> 'required|min:3'
        ];
        $message=[
            'category.required'=> 'El nombre de la categoría es obligatorio.',
            'category.min' => 'El nombre de la categoría debe tener mas de 3 caracteres.'
        ];

        $this->validate($request,$rules,$message);

        $category->category= $request->input('category');
        $category->description= $request->input('description');
        $category->save();
        $notification = 'La categoría se ha actualizado correctamente.';

        return redirect('/categorias')->with(compact('notification'));
    }

    public function destroy(Category $category){
        $deleteCategory = $category->category;
        $category->delete();
        $notification = 'La Categoría '.$deleteCategory.' se ha eliminado correctamente.';
        return redirect('/categorias')->with(compact( 'notification')) ;
    }

}

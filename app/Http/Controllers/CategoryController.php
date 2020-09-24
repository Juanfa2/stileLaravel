<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
    	$categorias = Category::all();
        return view('index', compact('categorias'));
    }

    public function showCategory($id){
    	$categorias = Category::find($id)->products()->get();
    	$nombre = Category::find($id);
    	return view('showCategory', compact('categorias', 'nombre'));
    }
    public function new(Request $request){

    	$errores = [
    		"nombre" => 'required|string|max:60|min:3',
           
    	];

    	$mensajes = [
    		'required' => ":attribute es necesario",
    		'max' => ":attribute tiene un maximo de :max caracteres ",
    		'min' => ":attribute debe ser como minimo de :min caracteres",
    		'string' => ":attribute debe ser solo letras"
    	];

    	$this->validate($request,$errores,$mensajes);
    	$category = new Category();
    	$category->nombre = $request["nombre"];
    	
    	$category->save();

    	return redirect("/admin");
    }

    public function update(Request $request){

        $errores = [
            "nombre" => 'required|string|max:60|min:3',
           
        ];

        $mensajes = [
            'required' => ":attribute es necesario",
            'max' => ":attribute tiene un maximo de :max caracteres ",
            'min' => ":attribute debe ser como minimo de :min caracteres",
            'string' => ":attribute debe ser solo letras"
        ];

        $this->validate($request,$errores,$mensajes);
        $category = Category::find($request->category_id);
        $category->nombre = $request->nombre;
        
        $category->save();

        return back();
    }

    public function delete(Request $request){
        $category = Category::find($request->category_id);
        $category->visible = 0;
        $category->save();

        return back();
    }
}

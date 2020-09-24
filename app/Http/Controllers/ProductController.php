<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
     public function show(){
        $productos = Product::all();
        $categorias = Category::all();
        return view('show', compact('productos' , 'categorias'));
    }

    public function admin(){
    	$productos = Product::all();
    	$categorias= Category::all();
    	return view('admin', compact('productos' , 'categorias'));
    }

    public function new(Request $request){

    	$errores = [
    		"nombre" => 'required|string|max:60|min:3',
            "precio" => 'required|numeric',
            "descripcion" => 'required|string|max:120|',
            "categoria"=> 'required|numeric'
    	];

    	$mensajes = [
    		'required' => ":attribute es necesario",
    		'max' => ":attribute tiene un maximo de :max caracteres ",
    		'min' => ":attribute debe ser como minimo de :min caracteres",
    		'numeric' => ":attribute debe ser numerico",
    		'string' => ":attribute debe ser solo letras"
    	];

    	$this->validate($request,$errores,$mensajes);
    	$producto = new Product();
    	$producto->nombre = $request["nombre"];
    	$producto->precioUnitario = $request["precio"];
        $producto->descripcion = $request["descripcion"];
        $producto->idCategoria = $request["categoria"];
        $producto->visible = 1;


    	$producto->save();

    	return redirect("/admin");
    }

    public function form(){
    	$categorias = Category::all();
        return view("newProduct", compact('categorias'));
    }

    public function delete(Request $request){
        $product = Product::find($request["product_id"]);
        $product->visible = 0;
        $product->save();

        return back();


    }

    public function update(Request $request){
        $errores = [
            "nombre" => 'required|string|max:60|min:3',
            "precio" => 'required|numeric',
            "descripcion" => 'required|string|max:120|',
        ];

        $mensajes = [
            'required' => ":attribute es necesario",
            'max' => ":attribute tiene un maximo de :max caracteres ",
            'min' => ":attribute debe ser como minimo de :min caracteres",
            'numeric' => ":attribute debe ser numerico",
            'string' => ":attribute debe ser solo letras"
        ];

        $this->validate($request,$errores,$mensajes);

        $producto = Product::find($request->product_id);
        $producto->nombre = $request->nombre;
        $producto->precioUnitario = $request->precio;
        $producto->descripcion = $request->descripcion;
      
        $producto->save();

        return back();    
    }
}

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
}

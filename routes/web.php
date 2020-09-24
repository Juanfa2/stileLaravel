<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', 'App\Http\Controllers\ProductController@admin');


Route::get('/', 'App\Http\Controllers\CategoryController@index')->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/show', 'App\Http\Controllers\ProductController@show')->name('show');

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'showCategory'] );

Route::get('new', function () {
    return view('newProduct');
});

Route::get('new','App\Http\Controllers\ProductController@form' );

Route::post('new', 'App\Http\Controllers\ProductController@new');

Route::post('category/new', 'App\Http\Controllers\CategoryController@new');
Route::post('category/edit', 'App\Http\Controllers\CategoryController@update');
Route::post('category/delete','App\Http\Controllers\CategoryController@delete');

Route::post('product/delete','App\Http\Controllers\ProductController@delete' );
Route::post('product/edit', 'App\Http\Controllers\ProductController@update');
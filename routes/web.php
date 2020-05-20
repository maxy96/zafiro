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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//CATEGORIAS
Route::get('/categorias', function(){
	return view('contenido.categoria');
})->name('categorias');

Route::get('/publicacion', function(){
	return view('contenido.publicado');
})->name('publicado');

//ADMIN
Route::get('/admin/tabla1', function(){
	return view('admin.tabla');
})->name('tabla1');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

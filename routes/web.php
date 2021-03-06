<?php

use Illuminate\Support\Facades\Route;

Route::post('/nuevaPropiedad', 'PropiedadesController@guardar' )->name('newpropi');
Route::get('/form', function(){
	return view('contenido.form1');
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//PROPIEDADES
Route::group(['prefix' => 'propiedades', 'as' => 'propiedades.'], function() {
	Route::get('/todos', 'PropiedadesController@todasLasPropiedades')->name('todos');
	Route::get('/{inmobiliaria}', 'PropiedadesController@propiedadesPorInmobiliaria')->name('inmobiliaria');
	Route::get('propiedad/{slug}', 'PropiedadesController@propiedad')->name('propiedad');
});

//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
	Route::get('/gestionar-propiedades', 'AdminController@gestionarPropiedades')->name('gestionarPropiedades');
	Route::get('/gestionar-propiedades/{path}', 'AdminController@gestionarPropiedades')->where('path', '.*');
});

//IDENTIFICACION
Auth::routes();

//prueba
Route::get('/pub', function() {
    return view('contenido.publicado');
});

Route::get('/maps', function(){
	return view('contenido.maps');
});

Route::get('/home', 'HomeController@index')->name('home');

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Propiedades;
use Illuminate\Support\Str as Str;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function guardar(array $data){
        return Propiedades::create([
            'inmobiliaria_id' => $data['inmobiliaria_id'],
            'estadoPropiedad_id' => $data['estadoPropiedad_id'],
            'direccion' => $data['direccion'],
            'titulo' => $data['titulo'],
            'caracteristica' => $data['caracteristica'],
            'imagen' => $data['imagen'],
            'slug' => Str::slug($data['titulo'].''.Str::random(6)),
            'precio' => $data['precio']
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->params as $data) {
            $propiedad = $this->guardar($data);
        }

        return response($propiedad, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

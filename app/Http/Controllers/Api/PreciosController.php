<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Precios;

class PreciosController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       return $this->guardarPrecio($request->all(), $request->propiedad_id);
    }

    private function guardarPrecio(array $data, $propiedadID)
    {
        $precio = Precios::create([
            'propiedad_id' => $propiedadID,
            'iso' => $data['iso'],
            'precio' => $data['precio']
        ]);

        return response(['data' => 'Precio guardado'], 201);
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

    public function update(Request $request, $id)
    {
        $precio = Precios::find($id);
        //Si la propiedad no tiene precios ejecutara la funcion guardar precio
        if(!$precio){
            return $this->guardarPrecio($request->all(), $id);
        }
        $precio->update([
            'propiedad_id' => $id,
            'iso' => $request->iso,
            'precio' => $request->precio
        ]);
        return response(['data' => 'Precio modificado'], 201);   
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

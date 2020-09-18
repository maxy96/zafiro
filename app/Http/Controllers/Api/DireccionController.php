<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Direcciones;

class DireccionController extends Controller
{

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
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response(['data' => [
                    'error' => true,
                    'message' => "Esta direccion ya existe"
                ]   
            ], 201);
        }

        return $this->guardarDireccion($request->all(), $request->propiedad_id);
    }

    private function guardarDireccion(array $data, $propiedadID)
    {
        $direccion = Direcciones::create([
            'propiedad_id' => $propiedadID,
            'direccion' => $data['direccion'],
            'lat' => $data['lat'],
            'lon' => $data['lng']
        ]);

         return response(['data' => [
                    'error' => false,
                    'message' => "Direccion almacenada"
                ]   
            ], 201);
    }

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
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response(['data' => [
                    'error' => true,
                    'message' => "Esta direccion ya existe"
                ]   
            ], 201);
        }

        $direccion = Direcciones::find($id);

        if(!$direccion){
           return $this->guardarDireccion($request->all(), $id);
        }else{   
            $direccion->update([
                'direccion' => $request->direccion,
                'lat' => $request->lat,
                'lon' => $request->lng
            ]);

            return response(['data' => [
                    'error' => false,
                    'message' => "Direccion modificada"
                ]
            ], 201);
        }
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'direccion' => ['required', 'string', 'max:255', 'unique:direcciones']
        ]);
    }
}

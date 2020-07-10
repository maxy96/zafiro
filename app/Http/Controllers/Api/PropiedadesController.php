<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str as Str;

use App\Models\Propiedades;

class PropiedadesController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->input('client') ) {
            return Propiedades::select('id_propiedad', 'direccion', 'titulo', 'inmobiliaria_id', 'estadoPropiedad_id', 'imagen')
            ->join('inmobiliarias', 'id_inmobiliaria', '=', 'inmobiliaria_id')
            ->join('estados_propiedades', 'id_estadoPropiedad', '=', 'estadoPropiedad_id')
            ->get();
        }

        $columns = ['id_propiedad', 'imagen' ,'direccion', 'titulo', 'inmobiliaria', 'estado', 'precio'];
        $column = $request->input('column'); //Index
        $length = $request->input('length');
        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        $query = Propiedades::select('propiedades.*' , 'inmobiliarias.inmobiliaria', 'estados_propiedades.descripcion as estado')
            ->join('inmobiliarias', 'id_inmobiliaria', '=', 'inmobiliaria_id')
            ->join('estados_propiedades', 'id_estadoPropiedad', '=', 'estadoPropiedad_id')
            ->orderBy($columns[$column], $dir);

        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('titulo', 'like', '%' . $searchValue . '%')
                ->orWhere('direccion', 'like', '%' . $searchValue . '%')
                ->orWhere('precio', 'like', '%' . $searchValue . '%');
            });
        }

        $propiedades = $query->paginate($length);
        return ['data' => $propiedades, 'draw' => $request->input('draw')];
    }

    public function guardarImagen($imagen)
    {
        $exploded = explode(',', $imagen);
        $decoded = base64_decode($exploded[1]);

        if(Str::contains($exploded[0], 'jpeg')){
            $extension = '.jpg';
        }else{
            $extension = '.png';
        }

        $fileName = Str::random().$extension;
        $path = public_path().'/imagen/'.$fileName;
        file_put_contents($path, $decoded);

        return $fileName;
    }

    public function store(Request $request)
    {
        $fileName = $this->guardarImagen($request->imagen);
        $propiedad = Propiedades::create([
            'inmobiliaria_id' => $request->inmobiliaria_id,
            'estadoPropiedad_id' => 1,
            'direccion' => $request->direccion,
            'titulo' => $request->titulo,
            'caracteristica' => $request->caracteristicas,
            'imagen' => $fileName,
            'slug' => Str::slug($request->titulo),
            'precio' => $request->precio
        ]);

        return response($propiedad, 201);
    }

    public function update(Request $request, $id)
    {
        if ($request->header == 'Estado') {
           $propiedad = $this->cambiarEstado($request->dato, $id);//Si el estado es 1 cambiara a 2
        }elseif ($request->header == 'Inmobiliaria') {
            $propiedad = $this->cambiarInmobiliaria($request->dato, $id);//Si la inmobiliaira es 1 cambia a 2
        }else{
            $propiedad = $this->editarPropiedad($request->all(), $id);
        }

        return response($propiedad, 201);
    }

    private function cambiarEstado($estadoID, $id)
    {
        $estadoPropiedad = Propiedades::find($id);
        return $estadoPropiedad->update(['estadoPropiedad_id' => $estadoID]);
    }
    private function cambiarInmobiliaria($inmobiliariaID, $id)
    {
        $inmobiliariaPropiedad = Propiedades::find($id);
        return $inmobiliariaPropiedad->update(['inmobiliaria_id' => $inmobiliariaID]);
    }

    private function editarPropiedad($data, $id)
    {
        if (preg_match("/,/", $data['imagen'])) {
            $fileName = $this->guardarImagen($data['imagen']);
        }else{
            $fileName = $data['imagen'];
        }
        
        $propiedad = Propiedades::find($id)->update([
                        'direccion' => $data['direccion'],
                        'titulo' => $data['titulo'],
                        'caracteristica' => $data['caracteristica'],
                        'imagen' => $fileName,
                        'slug' => Str::slug($data['titulo']),
                        'precio' => $data['precio']
                    ]);
        return $propiedad;
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

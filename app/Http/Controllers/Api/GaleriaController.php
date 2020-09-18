<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galerias;
use Illuminate\Support\Str as Str;

class GaleriaController extends Controller
{
	public function index(Request $request)
	{
		//
    }

    private function guardarImagen($imagen)
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
        if($request->has('imagenes')){
            return response(['data' => 'No hay imagenes'], 201);
        }
        
    	$propiedadID = $request->id_propiedad;
    	
    	foreach ($request->imagenes as $imagen) {
    		$fileName = $this->guardarImagen($imagen);
    		$galeria = Galerias::create([
    			'propiedad_id' => $propiedadID,
    			'imagen' => $fileName
    		]);
    	}

    	return response($galeria, 201);
    }

    public function show($id)
    {
        $galeria = Galerias::where('propiedad_id', '=', $id)->get();
        return response($galeria, 201);
    }
}

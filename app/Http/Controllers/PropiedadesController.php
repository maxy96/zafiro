<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Propiedades;
use App\Models\Inmobiliarias;

class PropiedadesController extends Controller
{
    public function todasLasPropiedades()
    {
    	$propiedades = Propiedades::where('estadoPropiedad_id', '=', '1')->get();
    	$title = "Todas las propiedades";
    	return view('contenido.propiedades', compact('propiedades', 'title'));
    }

    public function propiedadesPorInmobiliaria($inmobiliaria)
    {
    	$title = "Propiedades en $inmobiliaria";
    	$inmobiliarias = Inmobiliarias::where('inmobiliaria', '=', $inmobiliaria)->first();
    	$propiedades = $inmobiliarias->propiedades()->get();
    	return view('contenido.propiedades', compact('propiedades', 'title'));
    }

    public function propiedad($slug)
    {
        $propiedad = Propiedades::where('slug', '=', $slug)->first();
        return view('contenido.propiedad', compact('propiedad'));
    }
}

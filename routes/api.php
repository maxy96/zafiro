<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/////////////////////////////////////////

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/v1/propiedades', 'Api\PropiedadesController');

Route::apiResource('/v1/galerias', 'Api\GaleriaController');

Route::apiResource('/v1/inmobiliarias', 'Api\InmobiliariaController');

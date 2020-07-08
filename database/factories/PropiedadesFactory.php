<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Propiedades;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Propiedades::class, function (Faker $faker) {
    $titulo = $faker->title;
    return [
        'inmobiliaria_id' =>  rand(1, 2),
		'estadoPropiedad_id' =>  rand(1, 2),
		'direccion' =>  $faker->streetAddress,
		'titulo' => $titulo,
		'caracteristica' =>  $faker->text($maxNbChars = 100),
		'imagen' => $faker->image('public/imagen', 640, 480, 'cats', false),
		'slug' => Str::slug($titulo).''.Str::random(6),
		'precio' =>  $faker->randomFloat(2, 0, 10000)
    ];
});

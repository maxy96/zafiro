<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vendidos;
use Faker\Generator as Faker;

$factory->define(Vendidos::class, function (Faker $faker) {
	return [
		'propiedadSolicitada_id' => rand(1, 30) ,
		'fechaVendido' => $faker->date($format = 'Y-m-d', $min = 'now')
	];
});

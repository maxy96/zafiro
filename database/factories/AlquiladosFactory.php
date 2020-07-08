<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Alquilados;
use Faker\Generator as Faker;

$factory->define(Alquilados::class, function (Faker $faker) {
    return [
        'propiedadSolicitada_id' => rand(1, 30) ,
		'fechaVencimiento' => $faker->date($format = 'Y-m-d', $min = 'now')
    ];
});

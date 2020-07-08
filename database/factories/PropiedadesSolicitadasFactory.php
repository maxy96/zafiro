<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PropiedadesSolicitadas;
use Faker\Generator as Faker;

$factory->define(PropiedadesSolicitadas::class, function (Faker $faker) {
    return [
        'propiedad_id' => rand(1, 30),
		'user_id' => rand(1, 30),
		'fechaSolicitada' => $faker->date($format = 'Y-m-d', $max = 'now'), 
    ];
});

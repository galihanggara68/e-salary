<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Positions;
use Faker\Generator as Faker;

$factory->define(Positions::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->sentence(4)
    ];
});

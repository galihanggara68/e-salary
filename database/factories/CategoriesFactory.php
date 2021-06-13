<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence(10),
        'name' => $faker->name,
        'description' => $faker->sentence(10),
        'status' => $faker->sentence(10),
    ];
});

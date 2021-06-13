<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departments;
use Faker\Generator as Faker;

$factory->define(Departments::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->sentence(5)
    ];
});

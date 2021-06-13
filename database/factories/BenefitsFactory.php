<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Benefits;
use App\Employees;
use App\Categories;
use Faker\Generator as Faker;

$factory->define(Benefits::class, function (Faker $faker) {

    $randomNumber = rand(10, 100);

    return [
        'employee_id' => Employees::inRandomOrder()->first()->id,
        'categorie_id' => Categories::inRandomOrder()->first()->id,
        'nominal'  => rand(5, 10),
        'status' => $faker->sentence(10)
    ];
});

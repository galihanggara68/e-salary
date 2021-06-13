<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Absents;
use App\Employees;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Absents::class, function (Faker $faker) {
    return [
        'employee_id'  => Employees::inRandomOrder()->first()->id,
        'absent' => $faker->sentence(10),
        'description' => $faker->sentence(10),
        'time' => Carbon::now()
    ];
});

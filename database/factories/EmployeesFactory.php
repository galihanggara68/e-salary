<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees;
use App\Departments;
use App\Positions;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Employees::class, function (Faker $faker) {

    $randomNumber = rand(1, 100);

    return [
        'department_id' => Departments::inRandomOrder()->first()->id,
        'position_id' => Positions::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->sentence(8),
        'address' => $faker->sentence(10),
        'dob' => Carbon::now(),
        'gender' => $faker->sentence(5),
        'phone' => rand(5, 10),
        'start_work' => Carbon::now(),
        'status' => $faker->sentence(10)
    ];
});

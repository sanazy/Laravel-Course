<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'duration' => $faker->randomNumber(2),
        'price' => $faker->randomNumber(3),
        'author' => $faker->name(),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'pages' => $faker->numerify('###'),
        'ISBN' => $faker->numerify('##########'),
        'price' => $faker->numerify('###'),
        'published_at' => $faker->date(),
    ];
});

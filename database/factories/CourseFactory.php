<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Courses\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence,
        'description' => $faker->text,
        'starts_at'   => $faker->dateTimeBetween('+1 week', '+1 month'),
    ];
});

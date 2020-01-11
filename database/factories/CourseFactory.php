<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domains\Courses\Models\Course;
use App\User;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    $startDate = $faker->dateTimeBetween('+1 week', '+1 month');

    return [
        'title'       => $faker->sentence,
        'description' => $faker->text,
        'starts_at'   => $startDate,
        'ends_at'     => rand(0, 1) ? null : $startDate->add(new DateInterval('+2 days')),
        'user_id'     => User::inRandomOrder()->first()->id,
        'type'        => rand(1, 3),
    ];
});

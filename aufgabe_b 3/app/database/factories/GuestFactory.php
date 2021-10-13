<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->unique()->company,
        'text' => $faker->sentence
    ];
});

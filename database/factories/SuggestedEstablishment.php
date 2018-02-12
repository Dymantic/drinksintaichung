<?php

use Faker\Generator as Faker;

$factory->define(\App\Establishments\SuggestedEstablishment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'description' => $faker->paragraph,
        'opening_hours' => $faker->sentence,
        'happy_hour' => $faker->sentence,
        'email' => $faker->email,
    ];
});

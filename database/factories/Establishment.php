<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Establishments\Establishment::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'type' => $faker->randomElement(['Restaurant', 'Restaurant & Bar', 'Bar', 'Dive Bar', 'Ru Chow', 'Sports Bar']),
        'description' => $faker->sentence,
        'address' => $faker->address,
        'zh_address' => '32永門45義会147可際査別件村約候証民',
        'latitude' => $faker->numberBetween(240921, 241885) / 10000,
        'longitude' => $faker->numberBetween(1206277, 1206931) / 10000,
        'published' => false
    ];
});

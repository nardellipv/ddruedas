<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Accessory;
use Faker\Generator as Faker;

$factory->define(Accessory::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'description' => $faker->realText('200'),
        'price' => $faker->numberBetween('1000','1000000'),
        'condition' => $faker->randomElement(['Nuevo', 'Usado']),
        'picture' => $faker->imageUrl('640','480','transport'),
        'category_id' => rand(1, 8),
        'user_id' => rand(1, 10),
        'pattern_id' => rand(1, 603),
        'brand_id' => rand(1, 74),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'version' => $faker->text(5),
        'displacement' => rand(50, 1000),
        'year' => $faker->year(),
        'mileage' => rand(150, 99999),
        'price' => $faker->numberBetween('1000','10000'),
        'money' => $faker->randomElement(['$', 'U$S']),
//        'photo' => $faker->imageUrl(),
        'condition' => $faker->randomElement(['Nueva', 'Usada']),
        'fuel' => $faker->randomElement(['Nafta', 'Eléctrico', 'Otro']),
        'typeEngine' => $faker->randomElement(['2 Tiempos', '4 Tiempos']),
        'barter' => $faker->randomElement(['Si', 'No']),
        'status' => $faker->randomElement(['Activo', 'Pausado', 'Pendiente']),
        'expire' => \Carbon\Carbon::parse(now()->addDay(30)),
        'visit' => rand(10, 100),
        'comment' => $faker->realText('1000'),
        'user_id' => rand(1, 10),
        'type_id' => rand(1, 8),
        'pattern_id' => rand(1, 603),
        'brand_id' => rand(1, 74),
        'province_id' => '2',
        'region_id' => rand(1, 500),
    ];
});

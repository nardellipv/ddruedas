<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dealer;
use Faker\Generator as Faker;

$factory->define(Dealer::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);
    return [
        'nameAgency' => $title,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'phone' => rand(1000000, 9999999),
        'phone1' => rand(1000000, 9999999),
        'phoneWsp' => rand(1000000, 9999999),
        'web' => $faker->url,
        'facebook' => $faker->url,
        'instagram' => $faker->url,
        'about' => $faker->text(200),
        'logo' => $faker->imageUrl(),
        'nameResponsable' => $faker->name,
        'lat' => $faker->randomElement(['-32.8463005','-32.8463235','-32.8463125','-32.8443535','-32.8454245','-32.84630905','-32.8468635','-32.8463125','-32.8493535','-32.8462245']),
        'lng' => $faker->randomElement(['-68.823436,18','-68.823236,18','-68.825676,18','-68.827776,18','-68.883476,18','-68.868436,18','-68.852236,18','-68.855676,18','-68.822676,18','-68.872476,18']),
        'slug' => $title,
        'user_id' => rand(1, 10),
    ];
});

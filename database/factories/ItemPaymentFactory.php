<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemPayment;
use Faker\Generator as Faker;

$factory->define(ItemPayment::class, function (Faker $faker) {
    return [
        'item_id' => rand(1, 120),
        'payment_id' => rand(1, 4),
    ];
});

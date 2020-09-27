<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EquipmentItem;
use Faker\Generator as Faker;

$factory->define(EquipmentItem::class, function (Faker $faker) {
    return [
        'equipment_id' => rand(1, 11),
        'item_id' => rand(1, 120),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(\App\Rate::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'rate' => rand(2, 5)
    ];
});

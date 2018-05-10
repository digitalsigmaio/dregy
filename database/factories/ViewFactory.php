<?php

use Faker\Generator as Faker;

$factory->define(\App\View::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'user-agent' => $faker->userAgent,
        'user-ip' => $faker->ipv4
    ];
});

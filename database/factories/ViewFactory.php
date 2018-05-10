<?php

use Faker\Generator as Faker;

$factory->define(\App\View::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'user_agent' => $faker->userAgent,
        'user_ip' => $faker->ipv4
    ];
});

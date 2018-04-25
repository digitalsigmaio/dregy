<?php

use Faker\Generator as Faker;

$factory->define(App\Premium::class, function (Faker $faker) {
    return [
        'admin_id' => rand(1, 5),
        'priority' => rand(1, 3),
        'expires_at' => now()->addDays(7)
    ];
});
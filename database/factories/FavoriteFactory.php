<?php

use Faker\Generator as Faker;

$factory->define(\App\Favorite::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100)
    ];
});

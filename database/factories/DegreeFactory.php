<?php

use Faker\Generator as Faker;

$factory->define(App\Degree::class, function (Faker $faker) {
    return [
        'ar_name' => $degree = $faker->word,
        'en_name' => $degree,
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\ProductAdCategory::class, function (Faker $faker) {
    return [
        'ar_name' => $category = $faker->word,
        'en_name' => $category,
    ];
});

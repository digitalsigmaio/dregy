<?php

use Faker\Generator as Faker;

$factory->define(App\ProductAdFav::class, function (Faker $faker) {
    return [
        'product_ad_id' => rand(1, 20),
        'user_id' => rand(1, 100),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\ProductAdminReview::class, function (Faker $faker) {
    return [
        'product_ad_id' => rand(1, 20),
        'admin_id' => rand(1, 5),
        'approved' => $faker->boolean(90)
    ];
});

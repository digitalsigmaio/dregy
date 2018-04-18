<?php

use Faker\Generator as Faker;

$factory->define(App\ProductAd::class, function (Faker $faker) {
    $status = ['used', 'new'];
    $key = array_rand($status);
    return [
        'user_id' => rand(1, 100),
        'title' => $faker->name,
        'description' => $faker->text(100),
        'status' => $status[$key],
        'price' => $faker->randomNumber(3),
        'ref_id' => '#DEPA' . str_random(6) . time(),
        'product_ad_category_id' => rand(1, 6),
        'region_id' => $region = rand(1, 13),
        'city_id' => \App\Region::find($region)->cities()->inRandomOrder()->first()->id,
        'address' => $faker->streetAddress,
        'img' => $faker->imageUrl(320, 240),
        'promoted' => $faker->boolean(40)
    ];
});

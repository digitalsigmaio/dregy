<?php

use Faker\Generator as Faker;

$factory->define(App\ProductAd::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'title' => $title = $faker->name,
        'description' => $faker->text(100),
        'slug' => str_slug($title),
        'status' => rand(1, 2),
        'price' => $faker->randomNumber(3),
        'ref_id' => '#DEPA' . str_random(6) . time(),
        'product_ad_category_id' => rand(1, 6),
        'region_id' => $region = rand(1, 13),
        'city_id' => \App\Region::find($region)->cities()->inRandomOrder()->first()->id,
        'address' => $faker->streetAddress,
        'img' => '/img/products/' . rand(1, 10) . '.jpg',
        'approved' => $faker->boolean(90),
        'admin_id' => rand(1, 5)
    ];
});

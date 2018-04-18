<?php

use Faker\Generator as Faker;

$factory->define(App\Clinic::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'admin_id' => rand(1, 5),
        'ar_name' => $name = $faker->name,
        'en_name' => $name,
        'ar_slug' => str_slug($name),
        'en_slug' => str_slug($name),
        'degree_id' => rand(1, 8),
        'speciality_id' => rand(1, 15),
        'region_id' => $region = rand(1, 13),
        'city_id' => \App\Region::find($region)->cities()->inRandomOrder()->first()->id,
        'ar_address' => $address = $faker->streetAddress,
        'en_address' => $address,
        'ar_note' => $note = $faker->text(50),
        'en_note' => $note,
        'ar_work_times' => 'From 9 a.m to 5 p.m',
        'en_work_times' => 'From 9 a.m to 5 p.m',
        'website' => $faker->url,
        'email' => $faker->email,
        'img' => $faker->imageUrl(320, 240),
        'premium' => $faker->boolean(40)
    ];
});
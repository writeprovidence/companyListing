<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'title' => $faker->title,
        'review' => $faker->paragraph,
        'review_ip' => $faker->ipv4,
        'reliability' => rand(0,5),
        'pricing' => rand(0,5),
        'user_friendly' => rand(0,5),
        'features' => rand(0,5),
        'support' => rand(0,5),
        'score' => rand(0,10),
        'is_verified' => rand(0,1),
        'is_public' => rand(0,1),
        'feature' => rand(0,1),
        'likes' => rand(0,100),
        'dislikes' => rand(0,100),
        'slug' => 'review-'. rand(1,2000),
        'verification_ip' => $faker->ipv4,
        'verification_time' => $faker->dateTime,
        'response_user_id' => rand(0,1000),
        'logged_user_id' => rand(0,1000),
        'response_ip' => $faker->ipv4,
        'response' => $faker->paragraph,
        'response_timestamp' => $faker->dateTime,
    ];
});

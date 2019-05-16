<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => str_slug($faker->company) . '.com',
        'email' => $faker->companyEmail,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'link_to_go' => $faker->domainName,
        'score' => $faker->domainName,
        'description' => $faker->paragraph,
        'zip' => $faker->postcode,
        'state' => $faker->state,
        'city' => $faker->city,
        'country' => $faker->country,
        'address_line1' => $faker->address,
        'address_line2' => $faker->address,
        'is_public' => rand(0,1),
        'clicks_sent' => rand(0,100),
        'page_views' => rand(0,100),
        'alexa_global_rank' =>  rand(0,100000),
        'alexa_top_country_id' => $faker->countryCode,
        'alexa_country_rank' => rand(0,100000)
    ];
});



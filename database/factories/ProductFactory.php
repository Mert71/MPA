<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categoryEnum = ['Hip Hop', 'Rock', 'Jazz' , 'Soul', 'Pop'];
    return [
        'name' => $faker->sentence(2),
        'description' => $faker->sentence(10),
        'price' => $faker->numberBetween(100 , 5000),
        'category'=> $categoryEnum[rand(0,4)]
    ];
});

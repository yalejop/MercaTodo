<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' =>$faker->sentence,
        'description' =>$faker->text(100),
        'price' =>$faker->numberBetween($min = 0, $max = 200),
        'stock' =>$faker->numberBetween($min= 0, $max =10),
        'tags' =>$faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $fileName = $faker->numberBetween(1, 10) . '.jpg';

    return [
        'title' =>$faker->sentence(2),
        'description' =>$faker->paragraph(2),
        'image' => "upload-products/{$fileName}",
        'price' => $faker->randomFloat($maxDecimals = 2, $min = 1, $max = 1000),
        'stock' =>$faker->numberBetween(1, 10),
        'status' => $faker->randomElement(['available', 'unavailable']),
        'categoria_id' => $faker->numberBetween(1, 7),
    ];
});

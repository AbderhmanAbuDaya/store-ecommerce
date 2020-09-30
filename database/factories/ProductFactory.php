<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'brand_id'=>$faker->numberBetween(1,40),
        'slug'=>$faker->slug,
        'price'=>$faker->numberBetween(9,90000),
        'name'=>$faker->text(60),
        'description'=>$faker->paragraph,
       'in_stock'=>$faker->boolean,
        'sku'=>$faker->word,
        'manage_stock'=>false,

        'is_active'=>$faker->boolean,

    ];
});

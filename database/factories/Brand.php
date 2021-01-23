<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Brand::class, function (Faker $faker) {
    return [
        'is_active'=>$faker->boolean,
        'photo'=>$faker->imageUrl(),
        'name'=>$faker->word()
    ];
});

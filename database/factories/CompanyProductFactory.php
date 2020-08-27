<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyProduct;
use Faker\Generator as Faker;

$factory->define(CompanyProduct::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'price' => $faker->randomFloat(2, 100, 15000),
        'company_id' => 1
    ];
});

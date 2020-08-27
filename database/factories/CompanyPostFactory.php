<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyPost;
use Faker\Generator as Faker;

$factory->define(CompanyPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->realText(),
        'company_id' => 1
    ];
});

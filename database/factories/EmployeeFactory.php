<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'position' => $faker->jobTitle,
        'company_id' => \App\Company::first()->id,
        'user_id' => factory(\App\User::class)
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Employees::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'company_id' => $faker->numberBetween($min = 1, $max = 25),
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User_detail;
use Faker\Generator as Faker;

$factory->define(User_detail::class, function (Faker $faker) {
    return [
        'ssn' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'address_line_1' => $faker->buildingNumber,
        'address_line_2' => $faker->streetName,
        'phoneNumber' => $faker->phoneNumber,
        
    ];
});

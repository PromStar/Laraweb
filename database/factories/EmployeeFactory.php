<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employees;
use Faker\Generator as Faker;

$factory->define(Employees::class, function (Faker $faker) {
  return [
     'first_name' => $faker->firstNameMale,
     'last_name' => $faker->lastName,
     'company' => factory('App\Companies')->create()->id,
     'email' => $faker->email,
     'phone' => $faker->phoneNumber,
     'created_at' => now(),
     'updated_at' => now()
  ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Companies;
use Faker\Generator as Faker;

$factory->define(Companies::class, function (Faker $faker) {
   return [
      'name' => $faker->company,
      'email' => $faker->unique()->safeEmail,
      'logo' => $faker->image(public_path() . '/storage', 500, 500, 'business', false),
      'website' => $faker->url,
      'created_at' => now(),
      'updated_at' => now()
   ];
});

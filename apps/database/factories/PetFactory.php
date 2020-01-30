<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Pet::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'gender' => $faker->numberBetween(1, 3),
      'user_id' => $faker->numberBetween(1, 100),
      'age' => $faker->numberBetween(0, 30),
      'gender' => $faker->numberBetween(1, 3),
      'animal_category_id' => $faker->numberBetween(1, 5),
      'price' => $faker->randomElement([0, 100, 1000, 10000, 100000]),
      'body' => $faker->text,
      'pic1' => 'https://source.unsplash.com/random',
      'pic2' => 'https://source.unsplash.com/random',
      'pic3' => 'https://source.unsplash.com/random',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
});

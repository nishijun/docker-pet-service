<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '1111',
        'gender' => $faker->numberBetween(1, 3),
        'age' => $faker->numberBetween(0, 130),
        'prefecture_id' => $faker->numberBetween(1, 48),
        'thumbnail' => 'https://source.unsplash.com/random',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});

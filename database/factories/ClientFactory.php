<?php

use Faker\Generator as Faker;

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

$factory->define(App\Client::class, function (Faker $faker) {
    $abbreviation = implode([
        chr(rand(65,90)),
        chr(rand(65,90)),
        chr(rand(65,90))
    ]);
    return [
        'name' => $faker->name,
        'abbreviation' => $abbreviation,
    ];
});

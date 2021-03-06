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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone_number' => $faker->e164PhoneNumber,
        'institution' => $faker->company,
        'city' => $faker->city,
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->sentence,
        'body' => $faker->paragraph."<br><br>".$faker->text(1000)."<br><br>".$faker->paragraph,
    ];
});

$factory->define(App\Application::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'phone_number' => $faker->e164PhoneNumber,
        'institution' => $faker->company,
        'city' => $faker->city,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entry::class, function (Faker $faker) {

    return [
    	'user_id' => App\User::all()->random()->id,
        'title' => $faker->sentence,
        'body' => $faker->paragraph."<br><br>".$faker->text(1000)."<br><br>".$faker->paragraph,
    ];
});

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'phone_number' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'level' => 'administrator',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $name = $faker->name;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'slug' => str_slug($name),
        'gender' => 0,
        'avatar' => 'public/defaults/avatar/female.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Profil::class, function (Faker\Generator $faker) {

    return [
        'location' => $faker->city,
        'jobs' => $faker->title,
        'education' => $faker->sentence(10),
        'about' => $faker->paragraph(4),
    ];
});

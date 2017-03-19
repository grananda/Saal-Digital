<?php


/** @var Factory $factory */
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\ObjectItem::class, function (Faker\Generator $faker) {

    return [
        'name'        => $faker->sentence(rand(2, 3)),
        'description' => $faker->paragraph,
        'type'        => $faker->randomElement(['user', 'pc', 'tablet', 'server', 'service', 'website']),
    ];
});

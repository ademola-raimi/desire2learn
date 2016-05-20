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

$factory->define(Desire2Learn\User::class, function (Faker\Generator $faker) {
    return [
    	'username'        => $faker->name,
        'first_name'      => $faker->name,
        'last_name'       => $faker->name,
        'email'           => $faker->email,
        'role_id'         => 1,
        'password'        => bcrypt(str_random(10)),
        'remember_token'  => str_random(10),
        'avatar'          => $faker->url,
    ];
});


// $factory->define(LearnCast\Role::class, function (Faker\Generator $faker) {
//     return [
//         'name'       => $faker->name,
//         'role'       => 1,
//     ];
// });

$factory->define(Desire2Learn\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'icon'        => $faker->name,
        'user_id'     => 1,
    ];
});

$factory->define(Desire2Learn\Video::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->name,
        'url'         => $faker->url,
        'description' => $faker->text,
        'category_id' => 1,
        'user_id'     => 1,
        'views'       => 0,
    ];
});

$factory->define(Desire2Learn\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment'  => $faker->name,
        'video_id' => 1,
        'user_id'  => 1,
    ];
});

$factory->define(Desire2Learn\Favourite::class, function (Faker\Generator $faker) {
    return [
        'video_id' => 1,
        'user_id'  => 1,
    ];
});
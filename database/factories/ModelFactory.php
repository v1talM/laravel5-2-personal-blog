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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


//$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
//    return [
//        'title' => $faker->sentence(mt_rand(3, 10)),
//        'excerpt' => $faker->sentence(mt_rand(10,20)),
//        'thumbnail' => $faker->imageUrl(800,800),
//        'category_id' => 1,
//        'content' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
//        'published_at' => $faker->dateTimeBetween('-1 week','now'),
//    ];
//});
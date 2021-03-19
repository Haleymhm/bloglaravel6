<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'category_id' => 1,
        'title'=> $faker->sentence,
        'content' => $faker->text(1000),
        'status' => 0
    ];
});

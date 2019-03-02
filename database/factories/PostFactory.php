<?php
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) use ($factory) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->text(20),
        'slug' => $faker->unique()->word,
        'image'=> $faker->image,
        'body'=> $faker->text,
        'view_count'=>1924,
        'status'=>1,
        'is_approved'=>1

    ];
});

<?php
use App\Post;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(App\PostCategory::class, function (Faker $faker) use ($factory) {
    return [
        'post_id' => Post::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});
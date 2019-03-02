<?php
use App\Post;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(App\PostTag::class, function (Faker $faker) use ($factory) {
    return [
        'post_id' => Post::all()->random()->id,
        'tag_id' => Tag::all()->random()->id,
    ];
});
// $factory->define(Model::class, function (Faker $faker) {
//     return [
//         //
//     ];
// });

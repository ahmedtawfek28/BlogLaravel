<?php
use App\User;
use App\Post;
use App\Tag;
use App\Category;
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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->unique()->word
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->unique()->word,
        'image'=> $faker->image
    ];
});
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

$factory->define(App\subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->email
    ];
});
$factory->define(App\PostTag::class, function (Faker $faker) use ($factory) {
    return [
        'post_id' => Post::all()->random()->id,
        'tag_id' => Tag::all()->random()->id,
    ];
});
$factory->define(App\PostCategory::class, function (Faker $faker) use ($factory) {
    return [
        'post_id' => Post::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
}); 
<?php

use Faker\Generator as Faker;

$factory->define(App\subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->email
    ];
});

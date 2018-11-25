<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Follow::class, function (Faker $faker) {
    return [
        'user_id'=>mt_rand(1,50),
        'following_id'=>mt_rand(1,50)
    ];
});

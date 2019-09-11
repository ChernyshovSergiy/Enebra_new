<?php

use App\Models\Inf_subscriber;
use Faker\Generator as Faker;

$factory->define(Inf_subscriber::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});

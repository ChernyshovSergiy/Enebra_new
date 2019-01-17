<?php

use App\Const_article;
use Faker\Generator as Faker;

$factory->define(Const_article::class, function (Faker $faker) {
    return [
        'const_sections_id' => random_int(1, 3),
        'article:en' => $faker->sentence(3),
        'article:ru' => $faker->sentence(5),
        'side' => random_int(0, 1),
        'sort' => Const_article::max('sort') + 1
    ];
});

<?php

use App\Const_article;
use Faker\Generator as Faker;

$factory->define(Const_article::class, function (Faker $faker) {
    return [
        'const_sections_id' => 1,
        'article:en' => 'Ok_en',
        'article:ru' => 'Ok_pu',
        'side' => 1,
        'sort' => 101
    ];
});

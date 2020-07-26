<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'category_id' => factory(\App\Models\Category::class),
        'name' => $faker->name,
        'title' => $faker->sentence(4),
        'descriptoin' => $faker->word,
        'meta_name' => $faker->word,
        'meta_title' => $faker->word,
        'slug' => $faker->slug,
        'content' => $faker->paragraphs(3, true),
    ];
});

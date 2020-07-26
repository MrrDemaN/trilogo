<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->sentence(4),
        'descriptoin' => $faker->word,
        'meta_name' => $faker->word,
        'meta_title' => $faker->word,
        'slug' => $faker->slug,
    ];
});

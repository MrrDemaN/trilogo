<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Article::class, function (Faker $faker) {
    //$categoryId = DB::select('select id from categories order by rand() limit 1', []);

    return [
        'category_id' => factory(\App\Models\Category::class),
        'name' => $faker->name,
        'title' => $faker->sentence(4),
        'descriptoin' => $faker->word,
        'meta_name' => $faker->word,
        'meta_heads' => $faker->unique()->word,
        'slug' => $faker->unique()->slug,
        'content' => $faker->paragraphs(3, true),
    ];
});

<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Entity\Projects\Category::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});

<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Entity\Region::class, function (Faker $faker) {
    return [
        'name_uz' => $faker->unique()->city,
        'name_ru' => $faker->unique()->city,
        'name_en' => $faker->unique()->city,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null,
    ];
});

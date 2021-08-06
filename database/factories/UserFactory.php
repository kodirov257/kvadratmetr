<?php

use App\Entity\User\User;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (Faker $faker) {
    $active = $faker->boolean;
    $phoneActive = $faker->boolean;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'phone_verified' => $phoneActive,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'verify_token' => $active ? null : Str::uuid(),
        'phone_verify_token' => $phoneActive ? null : Str::uuid(),
        'phone_verify_token_expire' => $phoneActive ? null : Carbon::now()->addSeconds(300),
        'phone_auth' => false,
        'role' => $active ? $faker->randomElement([User::ROLE_USER, User::ROLE_ADMIN, User::ROLE_MODERATOR]) : User::ROLE_USER,
        'status' => $active ? User::STATUS_ACTIVE : User::STATUS_WAIT,
        'email_verified_at' => $active ? null : Carbon::now()->addSeconds(300),
        'remember_token' => Str::random(10),
    ];
});

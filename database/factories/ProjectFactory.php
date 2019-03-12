<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph(4),
        'title' => $faker->sentence,
        'owner_id' => factory(App\User::class)
    ];
});

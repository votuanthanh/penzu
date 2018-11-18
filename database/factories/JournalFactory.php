<?php

use Faker\Generator as Faker;

$factory->define(App\Journal::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph(rand(5, 10)),
	];
});
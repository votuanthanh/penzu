<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        //
        'description' => $faker->sentence,
        'user_id' => function () {
            $idsUser = App\User::all()->pluck('id')->toArray();
            return $idsUser[array_rand($idsUser)];
        },
        'journal_id' => function () {
            $idsJournal = App\Journal::all()->pluck('id')->toArray();
            return $idsJournal[array_rand($idsJournal)];
        },
    ];
});

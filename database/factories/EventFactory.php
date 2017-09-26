<?php

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "event_date" => $faker->date("Y-m-d", $max = 'now'),
    ];
});

<?php

$factory->define(App\Invitation::class, function (Faker\Generator $faker) {
    return [
        "event_id" => factory('App\Event')->create(),
        "email" => $faker->safeEmail,
        "sent_at" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "accepted_at" => $faker->date("Y-m-d H:i:s", $max = 'now'),
        "rejected_at" => $faker->date("Y-m-d H:i:s", $max = 'now'),
    ];
});

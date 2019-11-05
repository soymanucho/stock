<?php

use Faker\Generator as Faker;

$factory->define(App\Province::class, function (Faker $faker) {
    return [
      'name' => $faker->state()
    ];
});

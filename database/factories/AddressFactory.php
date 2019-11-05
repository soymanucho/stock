<?php

use Faker\Generator as Faker;
use App\Location;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
      'street'=> $faker->streetName(),
      'number'=> $faker->buildingNumber(),
      'floor'=> $faker->randomDigitNotNull(),
      'location_id'=> Location::inRandomOrder()->first(),
      'latitude'=> $faker->latitude(-60, -15),
      'longitude'=> $faker->longitude(-80, -45),
    ];
});

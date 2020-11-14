<?php

use Faker\Generator as Faker;
use App\Location;
use App\Client;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
      'street'=> $faker->streetName(),
      'number'=> $faker->buildingNumber(),
      'floor'=> $faker->randomDigitNotNull(),
      'cp'=> $faker->randomDigitNotNull(),
      'location_id'=> Location::inRandomOrder()->first(),
      'client_id'=> Client::inRandomOrder()->first(),
      'latitude'=> $faker->latitude(-60, -15),
      'longitude'=> $faker->longitude(-80, -45),
    ];
});

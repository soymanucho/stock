<?php

use Faker\Generator as Faker;
use App\Province;
use App\Location;

$factory->define(Location::class, function (Faker $faker) {
    return [
      'name'=>$faker->city(),
      'province_id' =>  Province::inRandomOrder()->first(),
    ];
});

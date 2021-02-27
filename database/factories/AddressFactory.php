<?php

namespace Database\Factories;

use App\Address;
use App\Client;
use App\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
      'street'=> $this->faker->streetName(),
      'number'=> $this->faker->buildingNumber(),
      'floor'=> $this->faker->randomDigitNotNull(),
      'cp'=> $this->faker->randomDigitNotNull(),
      'location_id'=> Location::inRandomOrder()->first(),
      'client_id'=> Client::inRandomOrder()->first(),
      'latitude'=> $this->faker->latitude(-60, -15),
      'longitude'=> $this->faker->longitude(-80, -45),
    ];
    }
}

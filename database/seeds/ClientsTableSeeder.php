<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
    	foreach (range(1,20) as $index)
      {
	        DB::table('clients')->insert([
	            'name' => $faker->firstName,
	            'cuit' => $faker->ssn,
	            'address_id' => rand(1,20),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ]);
	    }
    }
}

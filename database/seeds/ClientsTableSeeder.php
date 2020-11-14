<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

use App\PaymentDay;

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
	            'payment_day_id'=> PaymentDay::inRandomOrder()->first()->id,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ]);
	    }
    }
}

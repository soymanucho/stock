<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

use App\PaymentDay;
use DB;

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
	            'cuit' => rand(20,27).'-'.rand(10000000,99999999).'-'.rand(0,9),
	            'payment_day_id'=> PaymentDay::inRandomOrder()->first()->id,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        ]);
	    }
    }
}

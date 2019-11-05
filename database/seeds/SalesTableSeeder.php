<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
    	foreach (range(1,100) as $index)
      {
	        DB::table('sales')->insert([
	            'client_id' => rand(1,20),
	            'paymentType_id' => rand(1,5),
              'created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s'),

	        ]);
	    }
    }
}

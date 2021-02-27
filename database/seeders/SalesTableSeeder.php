<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Sale;
use App\Status;
use DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach (range(1,100) as $index)
      {
	        DB::table('sales')->insert([
	            'client_id' => rand(1,20),
	            'fee' => rand(1,18),
	            'user_id' => 1,
	            'payment_type_id' => rand(1,5),
              'created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s'),

	        ]);
	    }
      $sales = Sale::all();
      foreach ($sales as $sale) {
        $status = Status::inRandomOrder()->first();
        $sale->statuses()->attach($status);
        $sale->save();
      }
    }
}

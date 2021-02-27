<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Product;
use App\ProductStatus;
use DB;

class SaleDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,300) as $index)
      {
          DB::table('product_sale')->insert([
              'sale_id' => rand(1,100),
              'product_id' =>  rand(1,20),
              'product_status_id' =>  rand(1,4),
              'price' => $faker->randomFloat(2,100,900),
              'amount' => rand(1,5),
              'accepted_amount' => rand(1,5),
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

          ]);
      }
    }
}

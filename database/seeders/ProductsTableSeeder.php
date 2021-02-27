<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use DB;

  class ProductsTableSeeder extends Seeder
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
            DB::table('products')->insert([
                'name' => $faker->word(),
                'code' => $faker->randomNumber(6),
                'description' => $faker->words(4,true),
                'brand_id' =>  rand(1,12),
                'stock' =>  rand(1,10),
            ]);
        }
    }
}

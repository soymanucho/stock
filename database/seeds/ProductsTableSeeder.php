<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;


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
                'code' => $faker->lexify('?????????????'),
                'description' => $faker->sentence(6,true),
                'brand_id' =>  rand(1,12),
                'stock' =>  rand(1,10),
            ]);
        }
    }
}

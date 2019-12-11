<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;


  class ProductsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('product_statuses')->insert(['name' => 'Sin stock','color' => '#eb3434']);
      DB::table('product_statuses')->insert(['name' => 'Pedido al proveedor','color' => '#343aeb']);
      DB::table('product_statuses')->insert(['name' => 'Para remitir','color' => '#d9eb34']);
      DB::table('product_statuses')->insert(['name' => 'En stock','color' => '#34eb7a']);

    }
}

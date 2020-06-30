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
      DB::table('product_statuses')->insert(['name' => 'Cancelado','color' => '#d52b2b']);
      DB::table('product_statuses')->insert(['name' => 'Pedido','color' => '#d1b41b']);
      DB::table('product_statuses')->insert(['name' => 'Pedido por mail','color' => '#b5e220']);
      DB::table('product_statuses')->insert(['name' => 'En stock','color' => '#d78e11']);
      DB::table('product_statuses')->insert(['name' => 'Entregado','color' => '#41a74e']);
      DB::table('product_statuses')->insert(['name' => 'Recibido','color' => '#0f64c7']);
      DB::table('product_statuses')->insert(['name' => 'Facturado','color' => '#0fc79b']);

    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payment_days')->insert(['name' => 'Contado','days'=>0,'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_days')->insert(['name' => '30 días','days'=>30,'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_days')->insert(['name' => '60 días','days'=>60,'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_days')->insert(['name' => '7 días','days'=>7,'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_days')->insert(['name' => '7 días contra entrega','days'=>7,'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

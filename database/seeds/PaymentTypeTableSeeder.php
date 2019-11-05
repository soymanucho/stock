<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payment_types')->insert(['name' => 'Debito','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_types')->insert(['name' => 'Credito','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_types')->insert(['name' => 'Efectivo','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_types')->insert(['name' => 'Mixto','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('payment_types')->insert(['name' => 'Otro','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

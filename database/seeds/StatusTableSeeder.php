<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	        DB::table('statuses')->insert(['name' => 'Presupuestado','color' => '#eb3434','created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s')]);
	        DB::table('statuses')->insert(['name' => 'Preparado','color' => '#343aeb','created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s')]);
	        DB::table('statuses')->insert(['name' => 'Remitido','color' => '#34eb7a','created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s')]);
	        DB::table('statuses')->insert(['name' => 'Facturado','color' => '#999999','created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s')]);
	        DB::table('statuses')->insert(['name' => 'Cobrado','color' => '#999999','created_at' => Carbon::now()->subDays(rand(1,31))->format('Y-m-d H:i:s')]);

    }
}

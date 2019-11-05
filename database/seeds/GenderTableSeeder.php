<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('genders')->insert(['name' => 'Hombre','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('genders')->insert(['name' => 'Mujer','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('genders')->insert(['name' => 'Otro','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

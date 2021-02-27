<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert(['name' => 'Anestesiología','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('categories')->insert(['name' => 'Cirugía','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('categories')->insert(['name' => 'Enfermería','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('categories')->insert(['name' => 'Neonatología','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('categories')->insert(['name' => 'Ropa descartable','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('categories')->insert(['name' => 'Terapia intensiva','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

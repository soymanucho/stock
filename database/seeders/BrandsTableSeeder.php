<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('brands')->insert(['name' => '3M','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Portex','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Vygon','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Arrow','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Ecovac','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Medex','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Condesa','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Teknosan','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Atramat','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Clothier','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Smiths Medical','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Comodín','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Silmag','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Hipoalergic','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Jelco','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Baño Facil','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'snmprealwalkn-Morton','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Ambu','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Edwards','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Teleflex','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Neojet','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
      DB::table('brands')->insert(['name' => 'Soluthel','created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}

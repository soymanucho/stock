<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Address;
use DB;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $addresses = Address::factory()->count(50)->make();
    }
}

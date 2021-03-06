<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      $this->call([
                  RolesTableSeeder::class,
                  UsersTableSeeder::class,
                  PaymentDaysSeeder::class,
                  ProvincesTableSeeder::class,
                  LocationsLPTableSeeder::class,
                  // ClientsTableSeeder::class,
                  // AddressesTableSeeder::class,
                  BrandsTableSeeder::class,
                  PaymentTypeTableSeeder::class,
                  // ProductsTableSeeder::class,
                  StatusTableSeeder::class,
                  // SalesTableSeeder::class,
                  ProductsStatusesTableSeeder::class,
                  // SaleDetailsTableSeeder::class,

                ]);

    }
}

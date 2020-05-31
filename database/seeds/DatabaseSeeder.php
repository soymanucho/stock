<?php

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
                  UsersTableSeeder::class,
                  ProvincesTableSeeder::class,
                  LocationsLPTableSeeder::class,
                  // AddressesTableSeeder::class,
                  // ClientsTableSeeder::class,
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

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
      $this->call([UsersTableSeeder::class,
                  ProvincesTableSeeder::class,
                  LocationsTableSeeder::class,
                  AddressesTableSeeder::class,
                  ClientsTableSeeder::class,
                  BrandsTableSeeder::class,
                  PaymentTypeTableSeeder::class,
                  ProductsTableSeeder::class,
                  SalesTableSeeder::class,
                  ProductsStatusesTableSeeder::class,
                  SaleDetailsTableSeeder::class,

                ]);

    }
}

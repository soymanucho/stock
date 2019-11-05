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
        $this->call(ProvincesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(SaleDeatilsTableSeeder::class);
    }
}

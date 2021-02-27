<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new \App\User();
      $user->password = \Hash::make('admin');
      $user->email = 'admin@admin.com';
      $user->name = 'admin';
      $user->save();
      $user->assignRole('Administrador');
      
      $user2 = new \App\User();
      $user2->password = \Hash::make('vendedor');
      $user2->email = 'vendedor@vendedor.com';
      $user2->name = 'vendedor';
      $user2->save();
      $user2->assignRole('Vendedor');
      
    }
}

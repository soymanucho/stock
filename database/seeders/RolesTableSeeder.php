<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission1 = Permission::create(['name' => 'client']);
        $permission2 = Permission::create(['name' => 'brand']);
        $permission3 = Permission::create(['name' => 'order']);
        $permission4 = Permission::create(['name' => 'product']);
        $permission5 = Permission::create(['name' => 'supplier']);
        $permission6 = Permission::create(['name' => 'sale']);
        $permission7 = Permission::create(['name' => 'invoice']);

        $permission8 = Permission::create(['name' => 'budget']);
        $permission9 = Permission::create(['name' => 'receipt']);
        // $permission10 = Permission::create(['name' => 'audit-read-objectives']);
        // $permission11 = Permission::create(['name' => 'audit-read-report']);
        // $permission12 = Permission::create(['name' => 'audit-read-conclution']);
        // $permission13 = Permission::create(['name' => 'audit-read-history']);
        // $permission14 = Permission::create(['name' => 'audit-read-resume']);

        // $permission15 = Permission::create(['name' => 'audit-create']);
        // $permission16 = Permission::create(['name' => 'audit-export']);

        $role1 = Role::create(['name' => 'Administrador']);
        $role1->save();
        $role1->syncPermissions($permission1,
                                $permission2,
                                $permission3,
                                $permission4,
                                $permission5,
                                $permission6,
                                $permission7,
                                $permission8,
                                $permission9
                                // $permission10,
                                // $permission11,
                                // $permission12,
                                // $permission13,
                                // $permission14,
                                // $permission15,
                                // $permission16
                            );

        $role2 = Role::create(['name' => 'Vendedor']);
        $role2->save();
        $role2->syncPermissions($permission1,
                                $permission6

                                );

        
    }
}

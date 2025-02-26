<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Admin::create([
            'user_name' => 'BRC Super Admin',
            'password' => 'SuperPass@2025',
            'role' => Admin::ROLE_SUPER_ADMIN,
        ]);

        $super_role = Role::where(['name' => Admin::ROLE_SUPER_ADMIN])->first();

        $super_admin->assignRole([$super_role->id]);


        $purchase_admin = Admin::create([
            'user_name' => 'purchase admin',
            'password' => 'PurchaseAdmin@2025',
            'role' => Admin::ROLE_PURCHASE_ADMIN,
        ]);

        $purchase_role = Role::where(['name' => Admin::ROLE_PURCHASE_ADMIN])->first();

        $purchase_admin->assignRole([$purchase_role->id]);
    }
}

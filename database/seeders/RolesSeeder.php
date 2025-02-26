<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin_role = Role::create(['guard_name' => 'admin', 'name' => Admin::ROLE_SUPER_ADMIN]);

        $purchase_admin_role = Role::create(['guard_name' => 'admin', 'name' => Admin::ROLE_PURCHASE_ADMIN]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        Permission::create(['name'=>'show_users']);
        Permission::create(['name'=>'create_users']);
        Permission::create(['name'=>'update_users']);
        Permission::create(['name'=>'delete_users']);

        // Roles
        Permission::create(['name'=>'show_roles']);
        Permission::create(['name'=>'create_roles']);
        Permission::create(['name'=>'update_roles']);
        Permission::create(['name'=>'delete_roles']);

        // Translates
        Permission::create(['name'=>'show_translates']);
        Permission::create(['name'=>'create_translates']);
        Permission::create(['name'=>'update_translates']);
        Permission::create(['name'=>'delete_translates']);

        // Permissions
        Permission::create(['name'=>'assign_permissions']);
        Permission::create(['name'=>'update_permissions']);

        // Departments
        Permission::create(['name'=>'show_departments']);
        Permission::create(['name'=>'create_departments']);
        Permission::create(['name'=>'update_departments']);
        Permission::create(['name'=>'delete_departments']);

        // Employees
        Permission::create(['name'=>'show_employees']);
        Permission::create(['name'=>'create_employees']);
        Permission::create(['name'=>'update_employees']);
        Permission::create(['name'=>'delete_employees']);

        // Tasks
        Permission::create(['name'=>'show_tasks']);
        Permission::create(['name'=>'create_tasks']);
        Permission::create(['name'=>'update_tasks']);
        Permission::create(['name'=>'delete_tasks']);

        // Settings
        Permission::create(['name'=>'update_settings']);
    }
}

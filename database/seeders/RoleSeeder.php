<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Super Admin']);
        foreach (Permission::all() as $permission) {
            $role->givePermissionTo($permission->name);
        }

        $employeeRole = Role::create(['name' => 'Employee']);

        $permissions = [
            'show_tasks',
            'create_tasks',
            'update_tasks',
            'delete_tasks',
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::findOrCreate($permissionName);
            $employeeRole->givePermissionTo($permission);
        }
    }
}

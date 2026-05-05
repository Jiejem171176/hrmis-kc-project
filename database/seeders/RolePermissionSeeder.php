<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $guardName = 'web';

        $permissions = [
            'access admin portal',
            'access ess portal',
            'view all employees',
            'manage employees',
            'approve employee requests',
            'approve hod requests',
            'receive payroll instructions',
            'process payroll instructions',
            'manage roles and permissions',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => $guardName,
            ]);
        }

        $roles = [
            'Super Admin',
            'HR Admin',
            'Payroll Admin',
            'Managing Director',
            'HOD',
            'Employee',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => $guardName,
            ]);
        }

        Role::findByName('Super Admin', $guardName)->syncPermissions($permissions);

        Role::findByName('HR Admin', $guardName)->syncPermissions([
            'access admin portal',
            'access ess portal',
            'view all employees',
            'manage employees',
            'receive payroll instructions',
        ]);

        Role::findByName('Payroll Admin', $guardName)->syncPermissions([
            'access admin portal',
            'access ess portal',
            'receive payroll instructions',
            'process payroll instructions',
        ]);

        Role::findByName('Managing Director', $guardName)->syncPermissions([
            'access admin portal',
            'access ess portal',
            'view all employees',
            'approve hod requests',
        ]);

        Role::findByName('HOD', $guardName)->syncPermissions([
            'access ess portal',
            'approve employee requests',
        ]);

        Role::findByName('Employee', $guardName)->syncPermissions([
            'access ess portal',
        ]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}

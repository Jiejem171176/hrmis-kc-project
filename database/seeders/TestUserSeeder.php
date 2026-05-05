<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@hrmis.test'],
            [
                'name' => 'HRMIS Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        $role = Role::findByName('Super Admin', 'web');

        $user->syncRoles([$role]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\EmploymentStatus;
use Illuminate\Database\Seeder;

class EmploymentStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            [
                'code' => 'PROBATION',
                'name' => 'Probation',
                'description' => 'Employee is currently under probation period.',
                'is_active' => true,
            ],
            [
                'code' => 'CONFIRMED',
                'name' => 'Confirmed',
                'description' => 'Employee has completed probation and is confirmed.',
                'is_active' => true,
            ],
            [
                'code' => 'CONTRACT',
                'name' => 'Contract',
                'description' => 'Employee is hired under contract employment.',
                'is_active' => true,
            ],
            [
                'code' => 'RESIGNED',
                'name' => 'Resigned',
                'description' => 'Employee has resigned from the company.',
                'is_active' => true,
            ],
            [
                'code' => 'TERMINATED',
                'name' => 'Terminated',
                'description' => 'Employee employment has been terminated.',
                'is_active' => true,
            ],
            [
                'code' => 'RETIRED',
                'name' => 'Retired',
                'description' => 'Employee has retired from the company.',
                'is_active' => true,
            ],
        ];

        foreach ($statuses as $status) {
            EmploymentStatus::updateOrCreate(
                ['code' => $status['code']],
                $status
            );
        }
    }
}

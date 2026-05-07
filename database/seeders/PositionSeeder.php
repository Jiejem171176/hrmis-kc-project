<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $management = Department::where('code', 'MGMT')->first();
        $hr = Department::where('code', 'HR')->first();
        $finance = Department::where('code', 'FIN')->first();
        $operations = Department::where('code', 'OPS')->first();

        $positions = [
            [
                'department_id' => $management?->id,
                'code' => 'MD',
                'name' => 'Managing Director',
                'description' => 'Executive management and final approval authority.',
                'is_active' => true,
            ],
            [
                'department_id' => $hr?->id,
                'code' => 'HR_ADMIN',
                'name' => 'HR Admin',
                'description' => 'Human resource administration and employee management.',
                'is_active' => true,
            ],
            [
                'department_id' => $finance?->id,
                'code' => 'PAYROLL_ADMIN',
                'name' => 'Payroll Admin',
                'description' => 'Payroll processing and finance-related HR instructions.',
                'is_active' => true,
            ],
            [
                'department_id' => $operations?->id,
                'code' => 'HOD',
                'name' => 'Head of Department',
                'description' => 'Department-level supervision and approval responsibility.',
                'is_active' => true,
            ],
            [
                'department_id' => null,
                'code' => 'EMPLOYEE',
                'name' => 'Employee',
                'description' => 'General employee position placeholder.',
                'is_active' => true,
            ],
        ];

        foreach ($positions as $position) {
            Position::updateOrCreate(
                ['code' => $position['code']],
                $position
            );
        }
    }
}

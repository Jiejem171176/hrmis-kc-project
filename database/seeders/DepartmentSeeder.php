<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $hq = Branch::where('code', 'HQ')->first();

        $departments = [
            [
                'branch_id' => $hq?->id,
                'code' => 'HR',
                'name' => 'Human Resources',
                'description' => 'Human resource management and administration.',
                'is_active' => true,
            ],
            [
                'branch_id' => $hq?->id,
                'code' => 'FIN',
                'name' => 'Finance',
                'description' => 'Finance and payroll related functions.',
                'is_active' => true,
            ],
            [
                'branch_id' => $hq?->id,
                'code' => 'MGMT',
                'name' => 'Management',
                'description' => 'Executive and management office.',
                'is_active' => true,
            ],
            [
                'branch_id' => $hq?->id,
                'code' => 'OPS',
                'name' => 'Operations',
                'description' => 'Operations and service delivery.',
                'is_active' => true,
            ],
            [
                'branch_id' => $hq?->id,
                'code' => 'ICT',
                'name' => 'Information and Communication Technology',
                'description' => 'ICT systems and technical support.',
                'is_active' => true,
            ],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['code' => $department['code']],
                $department
            );
        }
    }
}

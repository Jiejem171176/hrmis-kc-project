<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\JobGrade;
use App\Models\Position;
use Illuminate\Database\Seeder;
use App\Models\User;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $hq = Branch::where('code', 'HQ')->first();

        $management = Department::where('code', 'MGMT')->first();
        $hr = Department::where('code', 'HR')->first();
        $finance = Department::where('code', 'FIN')->first();
        $operations = Department::where('code', 'OPS')->first();

        $confirmed = EmploymentStatus::where('code', 'CONFIRMED')->first();
        $adminUser = User::where('email', 'admin@hrmis.test')->first();

        $managementGrade = JobGrade::where('code', 'MANAGEMENT')->first();
        $executiveGrade = JobGrade::where('code', 'EXECUTIVE')->first();
        $g3 = JobGrade::where('code', 'G3')->first();

        $mdPosition = Position::where('code', 'MD')->first();
        $hrAdminPosition = Position::where('code', 'HR_ADMIN')->first();
        $payrollAdminPosition = Position::where('code', 'PAYROLL_ADMIN')->first();
        $hodPosition = Position::where('code', 'HOD')->first();
        $employeePosition = Position::where('code', 'EMPLOYEE')->first();

        $md = Employee::updateOrCreate(
            ['employee_number' => 'KC0001'],
            [
                'full_name' => 'Managing Director',
                'preferred_name' => 'MD',
                'ic_number' => null,
                'date_of_birth' => null,
                'gender' => null,
                'marital_status' => null,
                'religion' => null,
                'mobile_phone' => null,
                'personal_email' => null,
                'work_email' => 'md@hrmis.test',
                'joined_date' => now()->subYears(10)->toDateString(),
                'confirmed_date' => now()->subYears(9)->toDateString(),
                'employment_status_id' => $confirmed?->id,
                'branch_id' => $hq?->id,
                'department_id' => $management?->id,
                'position_id' => $mdPosition?->id,
                'job_grade_id' => $managementGrade?->id,
                'reporting_manager_id' => null,
                'is_active' => true,
                'remarks' => 'Seeded Managing Director employee record.',
            ]
        );

        $hod = Employee::updateOrCreate(
            ['employee_number' => 'KC0002'],
            [
                'full_name' => 'Head of Operations',
                'preferred_name' => 'HOD Ops',
                'work_email' => 'hod.ops@hrmis.test',
                'joined_date' => now()->subYears(6)->toDateString(),
                'confirmed_date' => now()->subYears(5)->toDateString(),
                'employment_status_id' => $confirmed?->id,
                'branch_id' => $hq?->id,
                'department_id' => $operations?->id,
                'position_id' => $hodPosition?->id,
                'job_grade_id' => $executiveGrade?->id,
                'reporting_manager_id' => $md->id,
                'is_active' => true,
                'remarks' => 'Seeded HOD employee record.',
            ]
        );

        Employee::updateOrCreate(
            ['employee_number' => 'KC0003'],
            [
                'user_id' => $adminUser?->id,
                'full_name' => 'HR Admin User',
                'preferred_name' => 'HR Admin',
                'work_email' => 'hr.admin@hrmis.test',
                'joined_date' => now()->subYears(4)->toDateString(),
                'confirmed_date' => now()->subYears(3)->toDateString(),
                'employment_status_id' => $confirmed?->id,
                'branch_id' => $hq?->id,
                'department_id' => $hr?->id,
                'position_id' => $hrAdminPosition?->id,
                'job_grade_id' => $executiveGrade?->id,
                'reporting_manager_id' => $md->id,
                'is_active' => true,
                'remarks' => 'Seeded HR Admin employee record.',
            ]
        );

        Employee::updateOrCreate(
            ['employee_number' => 'KC0004'],
            [
                'full_name' => 'Payroll Admin User',
                'preferred_name' => 'Payroll Admin',
                'work_email' => 'payroll.admin@hrmis.test',
                'joined_date' => now()->subYears(4)->toDateString(),
                'confirmed_date' => now()->subYears(3)->toDateString(),
                'employment_status_id' => $confirmed?->id,
                'branch_id' => $hq?->id,
                'department_id' => $finance?->id,
                'position_id' => $payrollAdminPosition?->id,
                'job_grade_id' => $executiveGrade?->id,
                'reporting_manager_id' => $md->id,
                'is_active' => true,
                'remarks' => 'Seeded Payroll Admin employee record.',
            ]
        );

        Employee::updateOrCreate(
            ['employee_number' => 'KC0005'],
            [
                'full_name' => 'Normal Employee User',
                'preferred_name' => 'Employee',
                'work_email' => 'employee@hrmis.test',
                'joined_date' => now()->subYears(2)->toDateString(),
                'confirmed_date' => now()->subYear()->toDateString(),
                'employment_status_id' => $confirmed?->id,
                'branch_id' => $hq?->id,
                'department_id' => $operations?->id,
                'position_id' => $employeePosition?->id,
                'job_grade_id' => $g3?->id,
                'reporting_manager_id' => $hod->id,
                'is_active' => true,
                'remarks' => 'Seeded normal employee record.',
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\JobGrade;
use Illuminate\Database\Seeder;

class JobGradeSeeder extends Seeder
{
    public function run(): void
    {
        $jobGrades = [
            [
                'code' => 'G1',
                'name' => 'Grade 1',
                'description' => 'Entry level employee grade.',
                'level' => 1,
                'is_active' => true,
            ],
            [
                'code' => 'G2',
                'name' => 'Grade 2',
                'description' => 'Junior employee grade.',
                'level' => 2,
                'is_active' => true,
            ],
            [
                'code' => 'G3',
                'name' => 'Grade 3',
                'description' => 'Intermediate employee grade.',
                'level' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'G4',
                'name' => 'Grade 4',
                'description' => 'Senior employee grade.',
                'level' => 4,
                'is_active' => true,
            ],
            [
                'code' => 'G5',
                'name' => 'Grade 5',
                'description' => 'Lead or specialist employee grade.',
                'level' => 5,
                'is_active' => true,
            ],
            [
                'code' => 'EXECUTIVE',
                'name' => 'Executive',
                'description' => 'Executive level grade.',
                'level' => 6,
                'is_active' => true,
            ],
            [
                'code' => 'MANAGEMENT',
                'name' => 'Management',
                'description' => 'Management level grade.',
                'level' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($jobGrades as $jobGrade) {
            JobGrade::updateOrCreate(
                ['code' => $jobGrade['code']],
                $jobGrade
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'code' => 'HQ',
                'name' => 'Headquarters Kuala Lumpur',
                'description' => 'Main headquarters office in Kuala Lumpur.',
                'email' => null,
                'phone' => null,
                'address' => 'Kuala Lumpur',
                'is_hq' => true,
                'is_active' => true,
            ],
            [
                'code' => 'JHR',
                'name' => 'Johor Branch',
                'description' => 'Branch office in Johor.',
                'email' => null,
                'phone' => null,
                'address' => 'Johor',
                'is_hq' => false,
                'is_active' => true,
            ],
            [
                'code' => 'MLK',
                'name' => 'Melaka Branch',
                'description' => 'Branch office in Melaka.',
                'email' => null,
                'phone' => null,
                'address' => 'Melaka',
                'is_hq' => false,
                'is_active' => true,
            ],
        ];

        foreach ($branches as $branch) {
            Branch::updateOrCreate(
                ['code' => $branch['code']],
                $branch
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodTypes = [
            [
                'type' => 'A+',
                'can_donate_to' => json_encode(['A+', 'AB+']),
                'can_receive_from' => json_encode(['A+', 'A-', 'O+', 'O-']),
            ],
            [
                'type' => 'A-',
                'can_donate_to' => json_encode(['A+', 'A-', 'AB+', 'AB-']),
                'can_receive_from' => json_encode(['A-', 'O-']),
            ],
            [
                'type' => 'B+',
                'can_donate_to' => json_encode(['B+', 'AB+']),
                'can_receive_from' => json_encode(['B+', 'B-', 'O+', 'O-']),
            ],
            [
                'type' => 'B-',
                'can_donate_to' => json_encode(['B+', 'B-', 'AB+', 'AB-']),
                'can_receive_from' => json_encode(['B-', 'O-']),
            ],
            [
                'type' => 'AB+',
                'can_donate_to' => json_encode(['AB+']),
                'can_receive_from' => json_encode(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            ],
            [
                'type' => 'AB-',
                'can_donate_to' => json_encode(['AB+', 'AB-']),
                'can_receive_from' => json_encode(['A-', 'B-', 'AB-', 'O-']),
            ],
            [
                'type' => 'O+',
                'can_donate_to' => json_encode(['A+', 'B+', 'AB+', 'O+']),
                'can_receive_from' => json_encode(['O+', 'O-']),
            ],
            [
                'type' => 'O-',
                'can_donate_to' => json_encode(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'can_receive_from' => json_encode(['O-']),
            ],
        ];

        DB::table('blood_types')->insert($bloodTypes);
    }
}

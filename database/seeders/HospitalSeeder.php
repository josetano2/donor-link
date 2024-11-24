<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospitals')->insert([
            [
                'name' => 'Jakarta General Hospital',
                'location' => 'Jl. Sudirman No. 1, Jakarta',
                'phone_number' => '021-12345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'South Jakarta Medical Center',
                'location' => 'Jl. Panglima Polim No. 25, Jakarta',
                'phone_number' => '021-87654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'North Jakarta Healthcare',
                'location' => 'Jl. Kelapa Gading No. 10, Jakarta',
                'phone_number' => '021-11112222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'East Jakarta Hospital',
                'location' => 'Jl. Bekasi Timur No. 50, Jakarta',
                'phone_number' => '021-33334444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'West Jakarta Clinic',
                'location' => 'Jl. Daan Mogot No. 75, Jakarta',
                'phone_number' => '021-55556666',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

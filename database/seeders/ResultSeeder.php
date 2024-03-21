<?php

namespace Database\Seeders;

use App\Models\Results;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resultList = [
            [
                'id' => Str::uuid(), // Menggunakan UUID
                'types_id' => 1,
                'user_id' => 7,
                'event_id' => 1,
                'score' => json_encode([
                    'R' => 30,
                    'I' => 10,
                    'A' => 20,
                    'S' => 24,
                    'E' => 29,
                    'C' => 10,
                ]),
                'start_time' => '2024-02-16 14:02:21',
                'end_time' => '2024-02-16 14:02:21',
                'difference' => '01:20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(), // Menggunakan UUID
                'types_id' => 1,
                'user_id' => 8,
                'event_id' => 2,
                'score' => json_encode([
                    'R' => 20,
                    'I' => 10,
                    'A' => 20,
                    'S' => 21,
                    'E' => 25,
                    'C' => 10,
                ]),
                'start_time' => '2024-02-16 14:02:21',
                'end_time' => '2024-02-16 14:02:21',
                'difference' => '01:20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];
          Results::insert($resultList);
    }
}

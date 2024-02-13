<?php

namespace Database\Seeders;

use App\Models\Results;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ResultList = [
            [
                'id' => 1,
                'types_id' => 1,
                'user_id' => 2,
                'event_id' => 1,
                'event_id' => 1,
                'score' => json_encode(
                    [
                        'R' => 30,
                        'I' => 10,
                        'A' => 20,
                        'S' => 24,
                        'E' => 29,
                        'C' => 10,
                    ]),
                    'start_time' => '01:20',
                    'end_time' => '01:20',
                    'difference' => '01:20',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 2,
                'types_id' => 1,
                'user_id' => 3,
                'event_id' => 2,
                'score' => json_encode(
                    [
                        'R' => 20,
                        'I' => 10,
                        'A' => 20,
                        'S' => 21,
                        'E' => 25,
                        'C' => 10,
                    ]),
                    'start_time' => '01:20',
                    'end_time' => '01:20',
                    'difference' => '01:20',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 3,
                'types_id' => 1,
                'user_id' => 3,
                'event_id' => 3,
                'score' => json_encode(
                    [
                        'R' => 20,
                        'I' => 10,
                        'A' => 20,
                        'S' => 21,
                        'E' => 25,
                        'C' => 10,
                    ]),
                    'start_time' => '01:20',
                    'end_time' => '01:20',
                    'difference' => '01:20',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 4,
                'types_id' => 1,
                'user_id' => 3,
                'event_id' => 1,
                'event_id' => 1,
                'score' => json_encode(
                    [
                        'R' => 20,
                        'I' => 15,
                        'A' => 30,
                        'S' => 21,
                        'E' => 25,
                        'C' => 20,
                    ]),
                    'start_time' => '01:20',
                    'end_time' => '01:20',
                    'difference' => '01:20',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

          Results::insert($ResultList);
    }
}

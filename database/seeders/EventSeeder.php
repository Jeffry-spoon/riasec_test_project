<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listEvent = [
            [
                'id' => 1,
                'slug' => 'test-event-(fk)',
                'title'=> 'Test event (FK)',
                'is_active' => true,
                'cut_off_date' => '2024-02-16 14:02:21',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 2,
                'slug' => 'test-event-kedua-(ftik)',
                'title'=> 'Test event kedua (FTIK)',
                'is_active' => true,
                'cut_off_date' => '2024-02-16 14:02:21',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 3,
                'slug' => 'test-event-',
                'title'=> 'Test event (FK)',
                'is_active' => true,
                'cut_off_date' => '2024-02-16 14:02:21',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Event::insert($listEvent);
    }
}
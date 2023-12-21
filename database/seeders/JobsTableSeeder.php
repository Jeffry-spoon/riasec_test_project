<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jobs;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobsList = [
            [
                'id' => 1,
                'jobs_text' => 'Agriculture',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 2,
                'jobs_text' => 'Health Assistant',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 3,
                'jobs_text' => 'Computers',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 4,
                'jobs_text' => 'Construction',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 5,
                'jobs_text' => 'Mechanic/Machinist',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 6,
                'jobs_text' => 'Engineering',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 7,
                'jobs_text' => 'Food and Hospitality',
                'categories_id' => '1',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 8,
                'jobs_text' => 'Marine Biology',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 9,
                'jobs_text' => 'Engineering',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 10,
                'jobs_text' => 'Chemistry',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 11,
                'jobs_text' => 'Zoology',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 12,
                'jobs_text' => 'Medicine/Surgery',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 13,
                'jobs_text' => 'Consumer Economics',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 14,
                'jobs_text' => 'Psychology',
                'categories_id' => '2',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 15,
                'jobs_text' => 'Communications',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 16,
                'jobs_text' => 'Cosmetology',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 17,
                'jobs_text' => 'Fine and Performing Arts',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 18,
                'jobs_text' => 'Photography',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 19,
                'jobs_text' => 'Radio and TV',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 20,
                'jobs_text' => 'Interior Design',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 21,
                'jobs_text' => 'Architecture',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 22,
                'jobs_text' => 'Public and Human Services',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 23,
                'jobs_text' => 'Public and Human Services',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 24,
                'jobs_text' => 'Arts and Communication',
                'categories_id' => '3',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 25,
                'jobs_text' => 'Counseling',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 26,
                'jobs_text' => 'Nursing',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 27,
                'jobs_text' => 'Physical Therapy',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 28,
                'jobs_text' => 'Travel',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 29,
                'jobs_text' => 'Advertising',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 30,
                'jobs_text' => 'Public Relations',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 31,
                'jobs_text' => 'Education',
                'categories_id' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 32,
                'jobs_text' => 'Fashion Merchandising',
                'categories_id' => '5',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 33,
                'jobs_text' => 'Real Estate',
                'categories_id' => '5',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 34,
                'jobs_text' => 'Marketing/Sales',
                'categories_id' => '5',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 35,
                'jobs_text' => 'Law',
                'categories_id' => '5',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 36,
                'jobs_text' => 'Political Science',
                'categories_id' => '5',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 37,
                'jobs_text' => 'International Trade',
                'categories_id' => 5,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 38,
                'jobs_text' => 'Banking/Finance',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 39,
                'jobs_text' => 'Accounting',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 40,
                'jobs_text' => 'Court Reporting',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 41,
                'jobs_text' => 'Insurance',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 42,
                'jobs_text' => 'Administration',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 43,
                'jobs_text' => 'Medical Records',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 44,
                'jobs_text' => 'Banking',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 44,
                'jobs_text' => 'Data Processing',
                'categories_id' => 6,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Jobs::insert($jobsList);
    }
}

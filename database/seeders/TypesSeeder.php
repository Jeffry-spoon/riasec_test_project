<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Types;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listQuiz = [
            [
                'id' => 1,
                'type_name' => 'Test Minat Bakat',
                'slug' => 'test-minat-bakat',
                'is_active' => true,
                'is_project' => true,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 2,
                'type_name' => 'Psikologi test',
                'slug' => 'psikologi-test',
                'is_active' => false,
                'is_project' => true,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 3,
                'type_name' => 'Ujian Akhir',
                'slug' => 'ujian-akhir',
                'is_active' => false,
                'is_project' => true,
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Types::insert($listQuiz);
    }
}

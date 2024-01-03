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
                'is_active' => true,
            ],
            [
                'id' => 2,
                'type_name' => 'Psikologi test',
                'is_active' => false,
            ],
            [
                'id' => 3,
                'type_name' => 'Ujian Akhir',
                'is_active' => false,
            ],
        ];

        Types::insert($listQuiz);
    }
}

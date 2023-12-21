<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $listCategories = [
        [
            'id' => 1,
            'category_text' => 'REALISTIC',
            'description'=> 'These people are often good at mechanical or athletic jobs.',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 2,
            'description'=> 'These people like to watch, learn, analyze and solve problems.',
            'category_text' => 'INVESTIGATIVE',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 3,
            'description'=> 'These people like to work in unstructured situations where they can use their creativity.',
            'category_text' => 'ARTISTIC',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 4,
            'description'=> 'These people like to work with other people, rather than things.',
            'category_text' => 'SOCIAL',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 5,
            'description'=> 'These people like to work with others and enjoy persuading and and performing.',
            'category_text' => 'ENTERPRISING',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 6,
            'description'=> 'These people are very detail oriented, organized and like to work with data.',
            'category_text' => 'CONVENTIONAL',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
    ];

    Categories::insert($listCategories);
    }
}

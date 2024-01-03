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
            'images' => '../../public/images/realistic.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 2,
            'description'=> 'These people like to watch, learn, analyze and solve problems.',
            'category_text' => 'INVESTIGATIVE',
            'images' => '../../public/images/invetigative.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 3,
            'description'=> 'These people like to work in unstructured situations where they can use their creativity.',
            'category_text' => 'ARTISTIC',
            'images' => '../../public/images/artisitic.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 4,
            'description'=> 'These people like to work with other people, rather than things.',
            'category_text' => 'SOCIAL',
            'images' => '../../public/images/social.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 5,
            'description'=> 'These people like to work with others and enjoy persuading and and performing.',
            'category_text' => 'ENTERPRISING',
            'images' => '../../public/images/enterprising.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
        [
            'id' => 6,
            'description'=> 'These people are very detail oriented, organized and like to work with data.',
            'category_text' => 'CONVENTIONAL',
            'images' => '../../public/images/conventional.png',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ],
    ];

    Categories::insert($listCategories);
    }
}

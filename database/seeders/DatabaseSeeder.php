<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Types;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\JobsTableSeeder;
use Database\Seeders\QuestionsSeeder;
use Database\Seeders\TypesSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminUserSeeder::class,
            CategoriesTableSeeder::class,
            TypesSeeder::class,
            QuestionsSeeder::class,
            UserSeeder::class,
            ResultSeeder::class,
            EventSeeder::class,
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
        [
            'name'=>'admin',
            'email'=> 'admin@laracamp.com',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        

    );
    }
}

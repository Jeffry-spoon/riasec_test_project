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

    $userList = [
        [
            'name'=>'admin',
            'email'=> 'admin@laracamp.com',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        [
            'name'=>'Triani',
            'email'=> 'triani.502019015@civitas.ukrida.ac.id',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        [
            'name'=>'Samsul',
            'email'=> 'samsul.502019028@civitas.ukrida.ac.id',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        [
            'name'=>'Nehemia',
            'email'=> 'nehemia.502021072@civitas.ukrida.ac.id',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        [
            'name'=>'Brilliana',
            'email'=> 'brilliana.502021106@civitas.ukrida.ac.id',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        [
            'name'=>'Ria ',
            'email'=> 'ria.502021080@civitas.ukrida.ac.id',
            'is_admin' => true,
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('Ukrida123!'),
        ],
        ];
    }
}
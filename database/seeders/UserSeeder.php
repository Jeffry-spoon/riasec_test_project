<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UsersDetail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserList = [
            [
                'id' => 2,
                'name' => 'norman.mcdonalid',
                'email' => 'norman.mcdonalid@example.com',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 3,
                'name' => 'Terri Hawkins',
                'email' => 'terri.hawkins@example.com',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];
        User::insert($UserList);

        $UserDetail = [
            [
                'id' => 1,
                'user_id' => 2,
                'education_level' => 'Kelas 12 IPA',
                'gender' => 'Male',
                'phone_number' => '(987) 610-4370',
                'school_name' => 'Santa Patricia',
                'occupation_desc' => 'IT developer',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id' => 2,
                'user_id' => 3,
                'education_level' => 'Kelas 12 IPA',
                'gender' => 'Female',
                'phone_number' => '(208) 682-9054',
                'school_name' => 'Santa Patricia',
                'occupation_desc' => 'Pilot',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];


        UsersDetail::insert($UserDetail);
    }
}

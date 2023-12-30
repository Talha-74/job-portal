<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [

                'name' => 'talha',
                'email' => 'talha@gmail.com',
                'password' => bcrypt('talha1122')
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin1122')
            ]
        ];

        foreach ($users as $user)
            User::create($user);
    }
}

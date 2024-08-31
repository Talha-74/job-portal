<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(10)->create();
        DB::transaction(function () {

            $superadmin = User::create([
                'name' => 'Talha',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('password')
            ]);
            $superadmin->assignRole('super-admin');

            $admin = User::create([
                'name' => 'sajid',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password')
            ]);
            $admin->assignRole('admin');
        });
    }
}

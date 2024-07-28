<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Programming'],
            ['name' => 'Testing'],
            ['name' => 'Marketing'],
            ['name' => 'Manging'],
            ['name' => 'Helping'],
            ['name' => 'Designing'],
        ];
        foreach ($categories as $key)
        Category::create($key);
}
}

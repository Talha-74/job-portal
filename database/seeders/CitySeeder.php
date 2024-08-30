<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $cities = json_decode(file_get_contents(database_path('data/cities.json')), true);

        foreach($cities as $city) {
            DB::table('cities')->insert($city);
            // City::create($city);
        }
    }
}

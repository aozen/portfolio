<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            'name' => "Covid 19 Charts",
            'description' => "The purpose of this project is to gather information about the number of Covid-19 cases, recoveries, and deaths in Turkey. The data will be obtained through an API connection, and will include both daily and cumulative figures. After the data is collected, it will be presented in charts for easy analysis and visualization.",
            'status' => 1
        ]);
    }
}

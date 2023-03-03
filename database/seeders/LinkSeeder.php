<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    public function run()
    {
        DB::table('links')->insert([
            [
                'project_id' => "1",
                'name' => "https://aliozendev.com/covid-19/",
            ],
            [
                'project_id' => "1",
                'name' => "https://github.com/aozen/covid-19"
            ]
        ]);
    }
}

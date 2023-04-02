<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Demo User",
            'email' => "demo@aliozendev.com",
            'password' => Hash::make('demodemo'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if(app()->isLocal()) {
            User::create([
                'name' => "Ali Özen",
                'email' => "contact@aliozendev.com",
                'password' => Hash::make('password'),
            ]);
        }
    }
}

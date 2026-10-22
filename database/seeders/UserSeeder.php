<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
         User::insert([
            [
                'username' => 'naresh',
                'password' => Hash::make('password123'),
                'phone' => '59221427',
                'email' => 'naresh@example.com',
                'user_type' => 'Admin',
            ],
            [
                'username' => 'dhanishta',
                'password' => Hash::make('password123'),
                'phone' => '58830788',
                'email' => 'dhanishta@example.com',
                'user_type' => 'Admin',
            ],
            [
                'username' => 'Adrian',
                'password' => Hash::make('password123'),
                'phone' => '57891234',
                'email' => 'adrian@example.com',
                'user_type' => 'User',
            ],
             [
                'username' => 'John',
                'password' => Hash::make('password123'),
                'phone' => '58891254',
                'email' => 'john@example.com',
                'user_type' => 'User',
            ],

        ]);
    }
}

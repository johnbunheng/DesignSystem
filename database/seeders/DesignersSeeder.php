<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DesignersSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('heng210204'),
            'role' => 'admin',
        ]);

        // Create Regular User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('88889999'),
            'role' => 'user',
        ]);

        // Create Designer Users
        User::create([
            'name' => 'Designer 1',
            'email' => 'designer1@example.com',
            'password' => Hash::make('88889999'),
            'role' => 'designer',
        ]);

        User::create([
            'name' => 'Designer 2',
            'email' => 'designer2@example.com',
            'password' => Hash::make('88889999'),
            'role' => 'designer',
        ]);

        User::create([
            'name' => 'Designer 3',
            'email' => 'designer3@example.com',
            'password' => Hash::make('88889999'),
            'role' => 'designer',
        ]);
    }
}
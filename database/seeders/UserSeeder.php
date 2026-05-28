<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Super Admin
        User::updateOrCreate(
            ['email' => 'admin@akaconsulting.com'],
            [
                'name' => 'Super Admin AKA',
                'password' => Hash::make('password123'),
                'role' => 'super_admin',
            ]
        );

        // Buat Editor
        User::updateOrCreate(
            ['email' => 'editor@akaconsulting.com'],
            [
                'name' => 'Editor AKA',
                'password' => Hash::make('password123'),
                'role' => 'editor',
            ]
        );
    }
}

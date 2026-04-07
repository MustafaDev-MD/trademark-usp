<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'mustafadeveloper57@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin.123'),
                'role' => 'admin',
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password'),
                'role' => 'System Developer',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
                'role' => 'Price Manager',
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'password' => bcrypt('password'),
                'role' => 'IT Administrator',
            ],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'role' => $userData['role'],
            ]);
        }
    }
}

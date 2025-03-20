<?php

namespace Database\Seeders;

use App\Models\Moderator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Moderator::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'type'=>'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}

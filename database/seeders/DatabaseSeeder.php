<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '081098765432',
            'address' => 'Jl. Raya No. 01',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '081234567890',
            'address' => 'Jl. Raya No. 01',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
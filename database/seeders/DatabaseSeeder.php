<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'CS ULP Dukuh Kupang',
            'email' => 'cs@pln.com',
            'password' => 'password123',
            'role' => 'admin',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'uuid' => '3dc1b903-73d0-4c8d-8883-0d887f12ea1e',
            'name' => 'Admin',
            'email' => 'adminsmartpetscare@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin1',
            'email' => 'admin1@example.com',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'role' => 'admin',
        ]);

        User::factory(5)->create();
    }
}

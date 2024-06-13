<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Tristan',
            'last_name' => 'Griffiths',
            'email' => 'test@example.com',
        ]);

        // reference job seeder
        $this->call(JobSeeder::class);
    }
}

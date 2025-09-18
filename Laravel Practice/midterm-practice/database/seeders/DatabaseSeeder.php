<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Author::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        Book::factory()->create([
            'title' => 'Wata nice',
            'published_year' => 2025
        ]);
    }
}

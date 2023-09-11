<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Category;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Users::factory()->create([
            'email' => 'test@test.com',
            'password' => '$2y$10$j0JaBj8dieVQcKPD3CFV5ONZOhG5BPxKm6PLKcPbiTYAmvWUcty2K',
            'status' => '1',
        ]);
        \App\Models\Category::factory(5)->create();
        \App\Models\News::factory(10)->create();
    }
}

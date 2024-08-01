<?php

namespace Database\Seeders;

use App\Models\Post;
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
        User::factory(100)->create();

        // User::factory()->create([
        //     'first_name' => fake()->firstName(),
        //     'last_name' => fake()->lastName(),
        //     'email' => fake()->unique()->safeEmail(),
        // ]);

        // Create posts with comments
        Post::factory(20)
            ->has(\App\Models\Comment::factory()->count(5))
            ->create();
    }
}

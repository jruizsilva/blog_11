<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(10)->create([
            'user_id' => 1
        ]);
    }
}
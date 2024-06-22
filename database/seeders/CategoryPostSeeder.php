<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $posts = Post::all();

        $posts->each(function ($post) use ($categories) {
            $randomCategories = $categories->random(2);

            $categoryIds = $randomCategories->pluck('id')->toArray();

            $post->categories()->attach($categoryIds);
        });
    }
}

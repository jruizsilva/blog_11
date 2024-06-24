<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(6);
        $data = [
            'category' => $category,
            'posts' => $posts
        ];
        return view('public.categories.show', $data);
    }
}

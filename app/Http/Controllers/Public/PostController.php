<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->latest()->paginate(5);
        $data = [
            'posts' => $posts
        ];
        return view('public.home.index', $data);
    }

    public function show(Post $post)
    {
        $post->load('categories', 'user');
        $data = [
            'post' => $post
        ];
        return view('public.posts.show', $data);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePostRequest;
use App\Http\Requests\Dashboard\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $posts = $user->posts()->latest()->paginate(7);
        $data = [
            'posts' => $posts
        ];
        return view('dashboard.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
        ];
        return view('dashboard.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return transactional(function () use ($request) {
            $createPostData = $request->safe()->except('categories');
            $createPostData['user_id'] = auth()->user()->id;
            $post = Post::create($createPostData);
            $post->categories()->attach($request->get('categories'));

            return redirect()->route('dashboard.posts.index')
                ->with('success', 'Post created successfully');
        });
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('edit', $post);
        $categories = Category::all();
        $data = [
            'post' => $post,
            'categories' => $categories
        ];
        return view('dashboard.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->safe()->except('categories'));
        $post->categories()->sync($request->get('categories'));
        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post deleted successfully');
    }
}

<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostListComponent extends Component
{
    use WithPagination;
    public function render()
    {
        // $posts = Post::with('categories')->latest()->paginate(5);
        // $data = [
        //     'posts' => $posts,
        // ];
        return view('livewire.post-list-component');
    }

    #[Computed()]
    public function posts()
    {
        $posts = Post::with('categories')->latest()->paginate(5);
        return $posts;
    }
}
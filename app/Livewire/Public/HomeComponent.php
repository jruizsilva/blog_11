<?php

namespace App\Livewire\Public;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;

    #[Computed()]
    public function posts()
    {
        $posts = Post::with('categories')->latest()->paginate(5);
        return $posts;
    }

    public function render()
    {
        return view('livewire.public.home-component');
    }
}
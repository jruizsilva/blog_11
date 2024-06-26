<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCardComponent extends Component
{
    public Post $post;
    public function render()
    {
        return view('livewire.post-card-component');
    }
}
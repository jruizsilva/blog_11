<?php

namespace App\Livewire\Common;

use App\Models\Post;
use Livewire\Component;

class PostCardComponent extends Component
{
    public Post $post;
    public function render()
    {
        return view('livewire.common.post-card-component');
    }
}
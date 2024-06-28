<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\CreatePostForm;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.dashboard")]
class CreatePostComponent extends Component
{
    public CreatePostForm $createPost;

    public function save()
    {
        $this->createPost->save();
    }
    public function render()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('livewire.dashboard.create-post-component', $data);
    }
}
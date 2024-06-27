<?php

namespace App\Livewire\Public;

use App\Models\Category;
use Livewire\Component;

class ShowCategoryComponent extends Component
{
    public Category $category;
    public function render()
    {
        $posts = $this->category->posts()->latest()->paginate(5);
        $data = [
            'posts' => $posts,
            'category' => $this->category
        ];
        return view('livewire.public.show-category-component', $data);
    }
}
<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePostForm extends Form
{
    public $title;
    public $categories = [];
    public $description;
    public function save()
    {
        $this->validate();
        dd($this->all());

        return transactional(function () {
            $createPostData = $this->except('categories');
            $createPostData['user_id'] = auth()->user()->id;
            $post = Post::create($createPostData);
            $post->categories()->attach($this->categories);

            return redirect()->route('dashboard.posts.index')
                ->with('success', 'Post created successfully');
        });
    }

    public function rules(): array
    {

        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
        ];
    }
    protected function prepareForValidation($attributes)
    {
        $attributes['slug'] = str($this->title)->slug() . "-" . uniqid();

        return $attributes;
    }
}
<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.dashboard")]
class CreatePostComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.create-post-component');
    }
}
<?php

namespace App\Livewire\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.dashboard")]
class EditPostComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.edit-post-component');
    }
}
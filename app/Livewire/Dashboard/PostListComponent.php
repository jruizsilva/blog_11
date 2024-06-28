<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout("layouts.dashboard")]
class PostListComponent extends Component
{
    use WithPagination;

    #[Computed()]
    public function posts()
    {
        /** @var User $user */
        $user = Auth::user();
        return $user->posts()->latest()->paginate(7);
    }
    public function render()
    {
        return view('livewire.dashboard.post-list-component');
    }

    public function delete($id)
    {
        /** @var User $user */
        $user = Auth::user();
        $user->posts()->where('id', $id)->delete();
    }

}
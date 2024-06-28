<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $last_name;
    public $email;
    public $image;
    public $username;
    public $slug;
    public $user;

    public function mount()
    {
        $user = Auth::user();
        $this->user = $user;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->slug = $user->slug;
    }

    public function render()
    {
        return view('livewire.user.profile-component');
    }


    public function prepareForValidation($attributes)
    {
        $user = Auth::user();
        $usernameChange = $this->username !== $user->username;
        $slug = $user->slug;
        if ($usernameChange) {
            $slug = str($this->username->slug()) . uniqid();
        }
        $attributes['slug'] = $slug;

        return $attributes;
    }

    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'image' => 'nullable|image|max:2048',
            'username' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:users,slug,' . Auth::user()->id
        ];
    }

    public function update()
    {
        $this->validate();
        $updateUserData = $this->except('image', 'user');

        if ($this->image !== null) {
            $updateUserData['image'] = $this->image->store('users/images');
        }
        /** @var User $user */
        $user = Auth::user();
        $user->update($updateUserData);

        session()->flash('success', 'User updated successfully');
        return $this->redirectRoute('user.edit', navigate: true);
    }

    public function destroyImage()
    {
        /** @var User $user */
        $user = Auth::user();
        Storage::delete($user->image);
        $user->update(['image' => null]);
        session()->flash('success', 'Image deleted successfully');
        return $this->redirectRoute('user.edit', navigate: true);
    }
}
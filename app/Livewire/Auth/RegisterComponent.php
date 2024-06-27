<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.auth.register-component');
    }

    public function register()
    {
        $this->validate();
        $registerData = $this->except('password_confirmation');
        $registerData['password'] = bcrypt($registerData['password']);
        $user = User::create($registerData);
        // Notification::send($user, new WelcomeNotification());

        session()->flash('success', 'Registration successful. Please login.');
        $this->redirectRoute('login.index');
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'password_confirmation' => 'required|string|min:4|same:password'
        ];
    }
}
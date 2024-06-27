<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;

class RegisterComponent extends Component
{
    public RegisterForm $registerForm;
    public function render()
    {
        return view('livewire.auth.register-component');
    }

    public function register()
    {
        $this->registerForm->register();

        session()->flash('success', 'Registration successful. Please login.');
        $this->redirectRoute('login.index');
    }
}
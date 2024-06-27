<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:4',
    ];

    public function authenticate()
    {
        $this->validate();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];
        if (Auth::attempt($credentials)) {
            session()->regenerate();

            session()->flash('success', 'Bienvenido ' . auth()->user()->name);
            return $this->redirectIntended(route('public.home.index'), true);
        }
        return $this->addError('password', 'Credenciales incorrectas');
    }
    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
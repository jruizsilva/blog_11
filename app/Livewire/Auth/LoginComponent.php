<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function authenticate()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return $this->redirectIntended(route('public.home.index'), true)
                ->with('success', 'Has iniciado sesión correctamente');
        }
        return $this->addError('password', 'Credenciales incorrectas');
    }
    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
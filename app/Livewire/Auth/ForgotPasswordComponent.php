<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPasswordComponent extends Component
{
    public $email;
    public function render()
    {
        return view('livewire.auth.forgot-password-component');
    }

    public function sendResetLink()
    {
        $this->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->remove('message');
            session()->flash('success', trans($status));
            return $this->redirectIntended(route('login.index'), true);
        }
        $this->addError('email', trans($status));
    }
}
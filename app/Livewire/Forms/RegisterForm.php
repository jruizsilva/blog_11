<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;

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

    public function register()
    {
        $this->validate();
        $registerData = $this->except('password_confirmation');
        $registerData['password'] = bcrypt($registerData['password']);
        $user = User::create($registerData);
        // Notification::send($user, new WelcomeNotification());
    }
}
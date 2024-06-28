<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPasswordComponent extends Component
{
    #[Url]
    public $token;
    #[Url]
    public $email;
    public $password;
    public $passwordConfirmation;

    public function render()
    {
        return view('livewire.auth.reset-password-component');
    }

    public function rules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
            'passwordConfirmation' => 'required|min:4|same:password'
        ];
    }

    public function updatePassword()
    {
        $this->validate();
        $updatePasswordData = $this->except('passwordConfirmation');
        $status = Password::reset(
            $updatePasswordData,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('success', trans($status));
            return $this->redirectRoute('login.index');
        }
        $this->addError('passwordConfirmation', trans($status));
    }
}
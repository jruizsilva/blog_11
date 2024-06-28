<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email'
        ]);

        $token = $request->get('token');
        $email = $request->get('email');
        $data = [
            'token' => $token,
            'email' => $email
        ];

        return view('auth.reset-password', $data);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $updatePasswordData = $request->validated();
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

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login.index')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
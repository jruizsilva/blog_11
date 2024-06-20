<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $registerData = $request->validated();

        $registerData['password'] = bcrypt($registerData['password']);

        $user = User::create($registerData);

        Notification::send($user, new WelcomeNotification());

        return redirect()->route('login.index')->with('success', 'Registration successful. Please login.');
    }
}

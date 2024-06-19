<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

        User::create($registerData);

        return redirect()->route('login.index')->with('success', 'Registration successful. Please login.');
    }
}

<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('user.dashboard.index');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
}

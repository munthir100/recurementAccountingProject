<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Account\Auth\LoginRequest;
use App\Http\Requests\Account\Customer\Auth\RegisterRequest;
use App\Models\Account;

class AuthController extends Controller
{
    public function authForm()
    {
        return view('main-site.account.auth.authForm');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('account')->attempt($credentials)) {
            return to_route('home.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function register(RegisterRequest $request)
    {
        $account = Account::create($request->validated());
        $customer = $account->customer()->create([]);

        return back()->with('success', 'register successfull');
    }

    public function logout(Request $request)
    {
        Auth::guard('account')->logout();

        return redirect('/');
    }
}

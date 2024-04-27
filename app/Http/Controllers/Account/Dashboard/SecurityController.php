<?php

namespace App\Http\Controllers\Account\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    function showSecurity()
    {
        return view('account.dashboard.security');
    }

    public function updateSecurity(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $account = request()->user('account');

        if (!Hash::check($request->input('old_password'), $account->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $account->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}

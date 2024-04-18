<?php

namespace App\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateSecurityRequest;

class SecurityController extends Controller
{
    function showSecurity()
    {
        return view('dashboard.security');
    }

    public function updateSecurity(UpdateSecurityRequest $request)
    {
        $user = request()->user();

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}

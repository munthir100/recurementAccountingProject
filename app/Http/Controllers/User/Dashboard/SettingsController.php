<?php

namespace App\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateSettingsRequest;

class SettingsController extends Controller
{
    public function showSettings()
    {
        $user = request()->user();
        return view('dashboard.settings', compact('user'));
    }

    public function updateSettings(UpdateSettingsRequest $request)
    {
        $user = request()->user();
        $user->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('user.dashboard.settings')->with('success', 'Profile updated successfully.');
    }
}

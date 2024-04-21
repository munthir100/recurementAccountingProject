<?php

namespace App\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateSettingsRequest;

class SettingsController extends Controller
{
    public function showSettings()
    {
        return view('dashboard.settings.index');
    }

    public function genral()
    {
        $user = request()->user();
        return view('dashboard.settings.genral', compact('user'));
    }

    public function updateSettings(UpdateSettingsRequest $request)
    {
        $user = request()->user();
        $user->update([
            'name' => $request->input('name'),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
}

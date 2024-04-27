<?php

namespace App\Http\Controllers\Account\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function showSettings()
    {
        $account = request()->user('account');
        return view('account.dashboard.settings.genral', compact('account'));
    }

    public function genral()
    {
        $account = request()->user('account');
        return view('account.dashboard.settings.genral', compact('account'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $account = request()->user('account');
        $account->update([
            'name' => $request->input('name'),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
}

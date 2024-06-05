<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Office;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Office\CreateOfficeRequest;
use App\Http\Requests\User\Office\UpdateOfficeRequest;
use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $this->authorize('read office');
        $offices = Office::with('account')->dynamicPaginate();
        return view('dashboard.offices.index', compact('offices'));
    }

    public function create()
    {
        $this->authorize('create office');
        return view('dashboard.offices.create');
    }

    public function store(CreateOfficeRequest $request)
    {
        $this->authorize('create office');
        $account = Account::create(
            array_merge($request->validated(), ['account_type_id' => AccountType::OFFICE])
        );

        $account->office()->create($request->validated());
        return redirect()->route('user.dashboard.offices.index')->with('success', 'created successfully.');
    }

    public function edit(Office $office)
    {
        $this->authorize('read office');
        $office->load('account','account.bankAccount');
        return view('dashboard.offices.edit', compact('office'));
    }

    public function show(Office $office)
    {
        $this->authorize('update office');
        $office->load('account');

        return view('dashboard.offices.show', compact('office'));
    }

    public function update(UpdateOfficeRequest $request, Office $office)
    {
        $this->authorize('update office');
        if ($request->filled('location')) {
            $office->update($request->only('location'));
        }
        if ($request->hasAny(['name', 'email', 'phone'])) {
            $office->account()->update($request->only('name', 'email', 'phone'));
        }

        return redirect()->back()->with('success', 'updated successfully.');
    }

    public function destroy(Office $office)
    {
        $this->authorize('delete office');
        $office->account()->delete();

        return redirect()->route('user.dashboard.offices.index')->with('success', 'deleted successfully.');
    }

    public function updatePassword(Office $office, Request $request)
    {
        $this->authorize('update office');
        $request->validate([
            'password' => 'required|string|min:8'
        ]);
        $office->account()->update([
            'password' => $request->password
        ]);

        return back()->with('success', 'updated successfully');
    }
}

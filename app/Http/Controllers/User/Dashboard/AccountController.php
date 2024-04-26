<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateAccountRequest;
use App\Http\Requests\User\Dashboard\UpdateAccountRequest;




class AccountController extends Controller
{
    public function index()
    {
        $this->authorize('read account');
        $active = Account::isActive()->count();
        $not_active = Account::isNotActive()->count();
        $closed = Account::isClosed()->count();
        $blocked = Account::isBlocked()->count();
        $overdue = Account::isOverdue()->count();

        $accounts = Account::useFilters()->dynamicPaginate();

        return view('user.dashboard.accounts.index', compact(
            'accounts',
            'active',
            'not_active',
            'closed',
            'blocked',
            'overdue',
        ));
    }

    public function create()
    {
        $this->authorize('create account');
        return view('user.dashboard.accounts.create');
    }

    public function store(CreateAccountRequest $request)
    {
        $this->authorize('create account');
        $account = Account::create($request->validated());
        if ($account->isOfficeAccount) {
            $account->office()->create($request->only('location'));
        }
        return to_route('user.dashboard.accounts.index')->with('success', 'created successfully');
    }

    public function show(Account $account)
    {
        $this->authorize('read account');
        return view('user.dashboard.accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        $this->authorize('update account');
        return view('user.dashboard.accounts.edit', compact('account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $this->authorize('read account');
        $account->update($request->validated());
        if ($account->isOfficeAccount) {
            $account->office()->update($request->only('location'));
        }
        return to_route('user.dashboard.accounts.index')->with('success', 'updated successfully');
    }

    public function destroy(Account $account)
    {
        $this->authorize('delete account');
        $account->delete();

        return to_route('user.dashboard.accounts.index')->with('success', 'deleted successfully');
    }
}

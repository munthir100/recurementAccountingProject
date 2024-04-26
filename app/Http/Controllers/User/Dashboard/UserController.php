<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateUserRequest;
use App\Http\Requests\User\Dashboard\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('read user');
        $active = User::isActive()->count();
        $not_active = User::isNotActive()->count();
        $closed = User::isClosed()->count();
        $blocked = User::isBlocked()->count();
        $overdue = User::isOverdue()->count();

        $users = User::useFilters()->dynamicPaginate();

        return view('user.dashboard.users.index', compact(
            'users',
            'active',
            'not_active',
            'closed',
            'blocked',
            'overdue',
        ));
    }

    public function create()
    {
        $this->authorize('create user');
        return view('user.dashboard.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->authorize('create user');
        $user = User::create($request->validated());
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }

        return to_route('user.dashboard.users.index')->with('success', 'created successfully');
    }

    public function show(User $user)
    {
        $this->authorize('read user');
        return view('user.dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update user');
        return view('user.dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update user');
        $user->update($request->validated());
        $user->syncPermissions($request->permissions);

        return back()->with('success', 'updated successfully');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete user');
        $user->delete();

        return to_route('user.dashboard.users.index')->with('success', 'deleted successfully');
    }
}

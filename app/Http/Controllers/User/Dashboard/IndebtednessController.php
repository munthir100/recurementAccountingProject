<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Indebtedness;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateIndebtednessRequest;
use App\Http\Requests\User\Dashboard\UpdateIndebtednessRequest;

class IndebtednessController extends Controller
{
    public function index()
    {
        $indebtednesses = Indebtedness::dynamicPaginate();

        return view('user.dashboard.indebtednesses.index', compact('indebtednesses'));
    }

    public function create()
    {
        return view('user.dashboard.indebtednesses.create');
    }

    public function store(CreateIndebtednessRequest $request)
    {
        $indebtedness = Indebtedness::create($request->validated());

        return to_route('user.dashboard.indebtednesses.index')->with('success', 'created successfully');
    }

    public function show(Indebtedness $indebtedness)
    {
        view('user.dashboard.indebtednesses.show', compact('bond'));
    }

    public function edit(Indebtedness $indebtedness)
    {
        return view('user.dashboard.indebtednesses.edit', compact('bond'));
    }

    public function update(UpdateIndebtednessRequest $request, Indebtedness $indebtedness)
    {
        $indebtedness->update($request->validated());

        return to_route('user.dashboard.indebtednesses.index')->with('success', 'updated successfully');
    }

    public function destroy(Indebtedness $indebtedness)
    {
        $indebtedness->delete();

        return to_route('user.dashboard.indebtednesses.index')->with('success', 'deleted successfully');
    }
}

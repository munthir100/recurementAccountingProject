<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Bond;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateBondRequest;
use App\Http\Requests\User\Dashboard\UpdateBondRequest;

class BondController extends Controller
{
    public function index()
    {
        $bonds = Bond::dynamicPaginate();

        return view('user.dashboard.bonds.index', compact('bonds'));
    }

    public function create()
    {
        return view('user.dashboard.bonds.create');
    }

    public function store(CreateBondRequest $request)
    {
        $bond = Bond::create($request->validated());

        return to_route('user.dashboard.bonds.index')->with('success', 'created successfully');
    }

    public function show(Bond $bond)
    {
        view('user.dashboard.bonds.show', compact('bond'));
    }

    public function edit(Bond $bond)
    {
        return view('user.dashboard.bonds.edit', compact('bond'));
    }

    public function update(UpdateBondRequest $request, Bond $bond)
    {
        $bond->update($request->validated());

        return to_route('user.dashboard.bonds.index')->with('success', 'updated successfully');
    }

    public function destroy(Bond $bond)
    {
        $bond->delete();

        return to_route('user.dashboard.bonds.index')->with('success', 'deleted successfully');
    }
}

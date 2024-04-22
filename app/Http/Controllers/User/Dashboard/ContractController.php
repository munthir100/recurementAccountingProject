<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Contract;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Dashboard\CreateContractRequest;
use App\Http\Requests\User\Dashboard\UpdateContractRequest;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::dynamicPaginate();

        return view('user.dashboard.contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('user.dashboard.contracts.create');
    }

    public function store(CreateContractRequest $request)
    {
        $contract = Contract::create($request->validated());

        return to_route('user.dashboard.contracts.index')->with('success', 'created successfully');
    }

    public function show(Contract $contract)
    {
        view('user.dashboard.contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        return view('user.dashboard.contracts.edit', compact('contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());

        return to_route('user.dashboard.contracts.index')->with('success', 'updated successfully');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return to_route('user.dashboard.contracts.index')->with('success', 'deleted successfully');
    }
}

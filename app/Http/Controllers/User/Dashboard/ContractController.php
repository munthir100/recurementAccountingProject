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
        $this->authorize('read contract');
        $active = Contract::isActive()->sum('amount');
        $expired = Contract::isExpired()->sum('amount');
        $terminated = Contract::isTerminated()->sum('amount');
        $renewed = Contract::isRenewed()->sum('amount');
        $cancelled = Contract::isCancelled()->sum('amount');
     
        $contracts = Contract::useFilters()->dynamicPaginate();

        return view('user.dashboard.reports.contracts.index', compact(
            'contracts',
            'active',
            'expired',
            'terminated',
            'renewed',
            'cancelled',
        ));
    }

    public function create()
    {
        $this->authorize('create contract');
        return view('user.dashboard.reports.contracts.create');
    }

    public function store(CreateContractRequest $request)
    {
        $this->authorize('create contract');
        $contract = Contract::create($request->validated());

        return to_route('user.dashboard.reports.contracts.index')->with('success', 'created successfully');
    }

    public function show(Contract $contract)
    {
        $this->authorize('read contract');
        return view('user.dashboard.reports.contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $this->authorize('update contract');
        return view('user.dashboard.reports.contracts.edit', compact('contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $this->authorize('update contract');
        $contract->update($request->validated());

        return to_route('user.dashboard.reports.contracts.index')->with('success', 'updated successfully');
    }

    public function destroy(Contract $contract)
    {
        $this->authorize('delete contract');
        $contract->delete();

        return to_route('user.dashboard.reports.contracts.index')->with('success', 'deleted successfully');
    }
}

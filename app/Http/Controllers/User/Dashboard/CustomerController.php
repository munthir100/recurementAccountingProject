<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Models\Account;
use App\Models\Customer;
use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Custoemr\CreateCustomerRequest;
use App\Http\Requests\User\Custoemr\UpdateCustomerRequest;


class CustomerController extends Controller
{
    public function index()
    {
        $this->authorize('read office');
        $customers = Customer::with('account')->dynamicPaginate();
        return view('dashboard.customers.index', compact('customers'));
    }

    public function create()
    {
        $this->authorize('create office');
        return view('dashboard.customers.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        $this->authorize('create office');
        $account = Account::create(
            array_merge($request->validated(), ['account_type_id' => AccountType::CUSTOMER])
        );
        $account->Customer()->create([]);

        return redirect()->route('user.dashboard.customers.index')->with('success', 'created successfully.');
    }

    public function show(Customer $customer)
    {
        $this->authorize('read office');
        $customer->load('account');
        return view('dashboard.customers.show', compact('Customer'));
    }
    
    public function edit(Customer $customer)
    {
        $this->authorize('update office');
        $customer->load('account');
        return view('dashboard.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->authorize('update office');
        $customer->update($request->validated());
        $customer->account()->update($request->validated());

        return back()->with('success', 'updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete office');
        $customer->account()->delete();

        return redirect()->route('user.dashboard.customers.index')->with('success', 'deleted successfully.');
    }

    public function updatePassword(Customer $customer, Request $request)
    {
        $this->authorize('update office');
        $request->validate([
            'password' => 'required|string|min:8'
        ]);
        $customer->account()->update([
            'password' => $request->password
        ]);

        return back()->with('success', 'password updated');
    }
}

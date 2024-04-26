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
        $customers = Customer::with('account')->dynamicPaginate();
        return view('dashboard.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        $account = Account::create(
            array_merge($request->validated(), ['account_type_id' => AccountType::CUSTOMER])
        );
        $account->Customer()->create([]);

        return redirect()->route('user.dashboard.customers.index')->with('success', 'created successfully.');
    }

    public function edit(Customer $customer)
    {
        $customer->load('account');
        return view('dashboard.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        $customer->account()->update($request->validated());

        return back()->with('success', 'updated successfully.');
    }

    public function show(Customer $customer)
    {
        $customer->load('account');
        return view('dashboard.customers.show', compact('Customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->account()->delete();

        return redirect()->route('user.dashboard.customers.index')->with('success', 'deleted successfully.');
    }

    public function updatePassword(Customer $customer, Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8'
        ]);
        $customer->account()->update([
            'password' => $request->password
        ]);

        return back()->with('success', 'password updated');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Bond;
use App\Models\User;
use App\Models\Order;
use App\Models\Office;
use App\Models\Worker;
use App\Models\Account;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\AccountType;
use App\Models\BankAccount;
use App\Models\Currency;
use App\Models\Transaction;
use App\Models\Indebtedness;
use App\Models\DeliveryAddress;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MainSeeder extends Seeder
{
    public function run()
    {
        $accountTypes = [AccountType::OFFICE, AccountType::CUSTOMER];

        $user = User::factory()->create();
        $user->syncPermissions(Permission::all());
        Currency::factory(30)->create();
        Country::factory(30)->create();
        $accounts = Account::factory(10)->create()->each(function ($account) {
            BankAccount::factory()->create([
                'account_id' => $account->id
            ]);
        });

        $accounts->filter(function ($account) {
            return $account->account_type_id === AccountType::OFFICE;
        })->each(function ($officeAccount) {
            $office = Office::factory()->create([
                'account_id' => $officeAccount->id,
            ]);
            Worker::factory(25)->create(['office_id' => $office->id]);
        });

        $accounts->filter(function ($account) {
            return $account->account_type_id === AccountType::CUSTOMER;
        })->each(function ($customer) {
            $customer = Customer::factory()->create([
                'account_id' => $customer->id,
            ]);
        });


        Blog::factory(30)->create();

        Order::factory(30)->create()->each(function ($order) {
            DeliveryAddress::factory()->create([
                'order_id' => $order->id,
            ]);
        });
        Invoice::factory(30)->create();
        Bond::factory(30)->create();
        Contract::factory(30)->create();
        Discount::factory(30)->create();
        Indebtedness::factory(30)->create();
        Transaction::factory(30)->create();
    }
}

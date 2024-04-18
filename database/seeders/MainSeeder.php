<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use App\Models\Office;
use App\Models\Worker;
use App\Models\Account;
use App\Models\Customer;
use App\Models\AccountType;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $accountTypes = [AccountType::OFFICE, AccountType::CUSTOMER];

        User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
        ]);

        $accounts = Account::factory(10)->create();

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
        Order::factory(30)->create();
    }
}

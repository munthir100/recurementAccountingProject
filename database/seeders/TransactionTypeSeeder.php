<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the transaction types
        $transactionTypes = [
            ['name' => 'Income'],
            ['name' => 'Expense'],
            ['name' => 'Transfer'],
            ['name' => 'Investment'],
            ['name' => 'Loan'],
            ['name' => 'Deposit'],
            ['name' => 'Withdrawal'],
        ];

        TransactionType::insert($transactionTypes);
    }
}

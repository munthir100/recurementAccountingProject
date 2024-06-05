<?php

namespace App\Observers;

use App\Models\Account;

class AccountObserver
{
    public function created(Account $account){
        if (app()->runningInConsole()) {
            return;
        }
        $account->bankAccount()->create([]);
    }
    public function deleting(Account $account)
    {
        $account->transactions()->delete();
        $account->contracts()->delete();
    }
}

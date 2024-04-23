<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MainSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\AccountTypeSeeder;
use Database\Seeders\SiteSettingsSeeder;
use Database\Seeders\TransactionTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusSeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(SiteSettingsSeeder::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(MainSeeder::class);
    }
}

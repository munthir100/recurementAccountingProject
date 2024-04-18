<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Active',
        ]);

        Status::create([
            'name' => 'Not Active',
        ]);

        Status::create([
            'name' => 'new',
        ]);

        Status::create([
            'name' => 'published',
        ]);
    }
}

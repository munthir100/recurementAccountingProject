<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = ['create', 'read', 'update', 'delete'];

        $models = [
            'User',
            'Account',
            'CV',
            'Worker',
            'Order',
            'Transaction',
            'Blog',
            'Bond',
            'Contract',
            'Discount',
            'Invoice',
            'Indebtedness',
        ];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                Permission::create(['name' => $action . ' ' . strtolower($model)]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            'ACTIVE',
            'NOT_ACTIVE',
            'BLOCKED',
            'CLOSED',
            'OVERDUE',
            'NEW',
            'PUBLISHED',
            'NOT_PUBLISHED',
            'PENDING',
            'CANCELLED',
            'EXPIRED',
            'TERMINATED',
            'RENEWED',
            'PROCESSING',
            'DELIVERED',
            'PARTIALLY_COMPLETED',
            'COMPLETED',
            'FAILED',
            'REVERSED',
            'PARTIALLY_REFUNDED',
            'REFUNDED',
            'FRAUD',
            'PREPAID',
            'USED',
            'SCHEDULED',
            'SUSPENDED',
            'DEACTIVATED',
            'LIMITED_AVAILABILITYAVAILABILITY',
            'DISPUTED',
            'VOID',
            'ARCHIVED',
            'FILLED',
        ];

        foreach ($statuses as $status) {
            $statusName = strtoupper(str_replace(' ', '_', $status));
            Status::updateOrCreate(['name' => $statusName]);
        }
    }
}

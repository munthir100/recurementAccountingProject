<?php

namespace App\Observers;

use App\Models\Office;

class OfficeObserver
{
    public function deleted(Office $office): void
    {
        $office->clearMediaCollection();
    }
}

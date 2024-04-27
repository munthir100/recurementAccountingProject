<?php

namespace App\Observers;

use App\Models\Country;

class CountryObserver
{
    public function deleted(Country $country): void
    {
        $country->clearMediaCollection();
    }
}

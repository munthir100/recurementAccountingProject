<?php

namespace App\Observers;

use App\Models\Cv;

class CvObserver
{
    public function updating(Cv $cv)
    {
        $cv->clearMediaCollection('cvs');
    }
    public function deleted(Cv $cv): void
    {
        $cv->clearMediaCollection();
    }
}

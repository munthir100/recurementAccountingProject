<?php

namespace App\Observers;

use App\Models\Worker;

class WorkerObserver
{
    public function saving(Worker  $worker)
    {
        $worker->languages = json_encode($worker->languages);
        $worker->practical_experience = json_encode($worker->practical_experience);
    }
}

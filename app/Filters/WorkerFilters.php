<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class WorkerFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['first_name', 'last_name', 'job', 'nationality'];
}

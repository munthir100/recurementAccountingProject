<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ServiceFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}

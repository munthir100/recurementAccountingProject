<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ContractFilters extends QueryFilters
{
    protected array $allowedFilters = ['status_id'];

    protected array $columnSearch = ['status_id'];
    protected array $relationSearch = [
        'status' => ['name']
    ];
}

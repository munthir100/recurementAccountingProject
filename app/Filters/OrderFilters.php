<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class OrderFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['contract_type'];


    protected array $relationSearch = [
        'status' => ['name']
    ];
}

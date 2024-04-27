<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class BlogFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['title', 'context'];
}

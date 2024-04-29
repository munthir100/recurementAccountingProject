<?php

namespace App\Models;

use App\Filters\BondFilters;
use App\Traits\HasStatus;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory, HasStatus, Filterable;

    protected $default_filters = BondFilters::class;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'interest_rate',
        'maturity_date',
        'issuer',
        'date_of_issue',
        'status_id',
    ];
    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::EXPIRED => 'Expired',
        Status::CANCELLED => 'Cancelled',
        Status::REFUNDED => 'Refunded',
        Status::SUSPENDED => 'Suspended',
        Status::PREPAID => 'Prepaid',
    ];
    
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}

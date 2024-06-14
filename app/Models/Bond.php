<?php

namespace App\Models;

use App\Traits\HasStatus;
use App\Filters\BondFilters;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bond extends Model
{
    use HasFactory, HasStatus, Filterable, LogsActivity;

    protected $default_filters = BondFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
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

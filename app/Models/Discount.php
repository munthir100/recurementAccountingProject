<?php

namespace App\Models;

use App\Models\Status;
use App\Models\Account;
use App\Traits\HasStatus;
use App\Filters\DiscountFilters;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory, HasStatus, Filterable, LogsActivity;

    protected $default_filters = DiscountFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
    protected $fillable = [
        'title',
        'description',
        'type',
        'amount',
        'end_data',
        'status_id',
        'account_id',
    ];

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::NOT_ACTIVE => 'Not Active',
        Status::EXPIRED => 'Expired',
        Status::CANCELLED => 'Cancelled',
        Status::USED => 'Used',
        Status::REJECTED => 'Rejected',
        Status::SCHEDULED => 'Scheduled',
        Status::SUSPENDED => 'Suspended',
        Status::DEACTIVATED => 'Deactivated',
        Status::LIMITED_AVAILABILITY => 'Limited Availability',
    ];

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

<?php

namespace App\Models;

use App\Traits\HasStatus;
use App\Filters\ContractFilters;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory, HasStatus, Filterable, LogsActivity;

    protected $default_filters = ContractFilters::class;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }
    protected $fillable = [
        'title',
        'description',
        'amount',
        'amount_type',
        'location',
        'renewal_terms',
        'start_date',
        'end_date',
        'status_id',
        'contractable_type',
        'contractable_id',
    ];

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::EXPIRED => 'Expired',
        Status::TERMINATED => 'Terminated',
        Status::RENEWED => 'Renewed',
        Status::CANCELLED => 'Cancelled',
    ];
}

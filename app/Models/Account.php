<?php

namespace App\Models;

use App\Models\Office;
use App\Traits\HasStatus;
use App\Models\AccountType;
use App\Filters\AccountFilters;
use Spatie\Activitylog\LogOptions;
use Essa\APIToolKit\Filters\Filterable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory, HasStatus, Filterable, LogsActivity;

    protected $default_filters = AccountFilters::class;

    protected $fillable = ['name', 'email', 'phone', 'password', 'account_type_id', 'status_id'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty();
    }

    const STATUSES = [
        Status::ACTIVE => 'Active',
        Status::NOT_ACTIVE => 'Not Active',
        Status::CLOSED => 'Closed',
        Status::BLOCKED => 'Blocked',
        Status::OVERDUE => 'Overdue'
    ];

    public function office()
    {
        return $this->hasOne(Office::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class);
    }

    public function contracts()
    {
        return $this->morphMany(Contract::class, 'contractable');
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    protected function isOfficeAccount(): Attribute
    {
        return Attribute::make()->get(fn () => $this->account_type_id == AccountType::OFFICE);
    }

    protected function isCustomerAccount(): Attribute
    {
        return Attribute::make()->get(fn () => $this->account_type_id == AccountType::CUSTOMER);
    }
}

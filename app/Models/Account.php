<?php

namespace App\Models;

use App\Models\Office;
use App\Models\AccountType;
use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory, HasStatus;

    protected $fillable = ['name', 'email', 'phone', 'password', 'account_type_id', 'status_id'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function office()
    {
        return $this->hasOne(Office::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
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

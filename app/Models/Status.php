<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name'];

    const ACTIVE = 1;
    const NOT_ACTIVE = 2;
    const BLOCKED = 3;
    const CLOSED = 4;
    const OVERDUE = 5;
    const NEW = 6;
    const PUBLISHED = 7;
    const NOT_PUBLISHED = 8;
    const PENDING = 9;
    const CANCELLED = 10;
    const EXPIRED = 11;
    const TERMINATED = 12;
    const RENEWED = 13;
    const PROCESSING = 14;
    const DELIVERED = 15;
    const PARTIALLY_COMPLETED = 16;
    const COMPLETED = 17;
    const FAILED = 18;
    const REVERSED = 19;
    const PARTIALLY_REFUNDED = 20;
    const REFUNDED = 21;
    const FRAUD = 22;
    const PREPAID = 23;
    const USED = 24;
    const SCHEDULED = 25;
    const SUSPENDED = 26;
    const DEACTIVATED = 27;
    const LIMITED_AVAILABILITY = 28;
    const DISPUTED = 29;
    const VOID = 30;
    const ARCHIVED = 31;
    const FILLED = 32;
    const REJECTED = 33;
    const PAID = 34;
    const PARTIALLY_PAID = 35;
    const ADMIN = 36;
}

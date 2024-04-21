<?php

namespace App\Traits;

use App\Models\Status;

trait HasStatus
{

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status_id', Status::ACTIVE);
    }

    public function scopeIsNotActive($query)
    {
        return $query->where('status_id', Status::NOT_ACTIVE);
    }

    public function scopeIsBlocked($query)
    {
        return $query->where('status_id', Status::BLOCKED);
    }

    public function scopeIsClosed($query)
    {
        return $query->where('status_id', Status::CLOSED);
    }

    public function scopeIsOverdue($query)
    {
        return $query->where('status_id', Status::OVERDUE);
    }

    public function scopeIsNew($query)
    {
        return $query->where('status_id', Status::NEW);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('status_id', Status::PUBLISHED);
    }

    public function scopeIsNotPublished($query)
    {
        return $query->where('status_id', Status::NOT_PUBLISHED);
    }

    public function scopeIsPending($query)
    {
        return $query->where('status_id', Status::PENDING);
    }

    public function scopeIsCancelled($query)
    {
        return $query->where('status_id', Status::CANCELLED);
    }

    public function scopeIsExpired($query)
    {
        return $query->where('status_id', Status::EXPIRED);
    }

    public function scopeIsTerminated($query)
    {
        return $query->where('status_id', Status::TERMINATED);
    }

    public function scopeIsRenewed($query)
    {
        return $query->where('status_id', Status::RENEWED);
    }

    public function scopeIsProcessing($query)
    {
        return $query->where('status_id', Status::PROCESSING);
    }

    public function scopeIsDelivered($query)
    {
        return $query->where('status_id', Status::DELIVERED);
    }

    public function scopeIsPartiallyCompleted($query)
    {
        return $query->where('status_id', Status::PARTIALLY_COMPLETED);
    }

    public function scopeIsCompleted($query)
    {
        return $query->where('status_id', Status::COMPLETED);
    }

    public function scopeIsFailed($query)
    {
        return $query->where('status_id', Status::FAILED);
    }

    public function scopeIsReversed($query)
    {
        return $query->where('status_id', Status::REVERSED);
    }

    public function scopeIsPartiallyRefunded($query)
    {
        return $query->where('status_id', Status::PARTIALLY_REFUNDED);
    }

    public function scopeIsRefunded($query)
    {
        return $query->where('status_id', Status::REFUNDED);
    }

    public function scopeIsFraud($query)
    {
        return $query->where('status_id', Status::FRAUD);
    }

    public function scopeIsPrepaid($query)
    {
        return $query->where('status_id', Status::PREPAID);
    }

    public function scopeIsUsed($query)
    {
        return $query->where('status_id', Status::USED);
    }

    public function scopeIsScheduled($query)
    {
        return $query->where('status_id', Status::SCHEDULED);
    }

    public function scopeIsSuspended($query)
    {
        return $query->where('status_id', Status::SUSPENDED);
    }

    public function scopeIsDeactivated($query)
    {
        return $query->where('status_id', Status::DEACTIVATED);
    }

    public function scopeIsLimitedAvailability($query)
    {
        return $query->where('status_id', Status::LIMITED_AVAILABILITY);
    }

    public function scopeIsDisputed($query)
    {
        return $query->where('status_id', Status::DISPUTED);
    }

    public function scopeIsVoid($query)
    {
        return $query->where('status_id', Status::VOID);
    }

    public function scopeIsArchived($query)
    {
        return $query->where('status_id', Status::ARCHIVED);
    }

    public function setStatus($status)
    {
        $this->status_id = $status;
        $this->save();
    }
}

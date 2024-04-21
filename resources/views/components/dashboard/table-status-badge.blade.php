@php
$statusBadge = [
\App\Models\Status::PUBLISHED => ['label' => 'Published', 'class' => 'success'],
\App\Models\Status::ACTIVE => ['label' => 'Active', 'class' => 'success'],
\App\Models\Status::NOT_ACTIVE => ['label' => 'Not Active', 'class' => 'warning'],
\App\Models\Status::BLOCKED => ['label' => 'Blocked', 'class' => 'danger'],
\App\Models\Status::CLOSED => ['label' => 'Closed', 'class' => 'danger'],
\App\Models\Status::OVERDUE => ['label' => 'Overdue', 'class' => 'danger'],
\App\Models\Status::NEW => ['label' => 'New', 'class' => 'primary'],
\App\Models\Status::NOT_PUBLISHED => ['label' => 'Not Published', 'class' => 'danger'],
\App\Models\Status::PENDING => ['label' => 'Pending', 'class' => 'primary'],
\App\Models\Status::CANCELLED => ['label' => 'Cancelled', 'class' => 'danger'],
\App\Models\Status::EXPIRED => ['label' => 'Expired', 'class' => 'danger'],
\App\Models\Status::TERMINATED => ['label' => 'Terminated', 'class' => 'danger'],
\App\Models\Status::RENEWED => ['label' => 'Renewed', 'class' => 'success'],
\App\Models\Status::PROCESSING => ['label' => 'Processing', 'class' => 'primary'],
\App\Models\Status::DELIVERED => ['label' => 'Delivered', 'class' => 'success'],
\App\Models\Status::PARTIALLY_COMPLETED => ['label' => 'Partially Completed', 'class' => 'info'],
\App\Models\Status::COMPLETED => ['label' => 'Completed', 'class' => 'success'],
\App\Models\Status::FAILED => ['label' => 'Failed', 'class' => 'danger'],
\App\Models\Status::REVERSED => ['label' => 'Reversed', 'class' => 'danger'],
\App\Models\Status::PARTIALLY_REFUNDED => ['label' => 'Partially Refunded', 'class' => 'warning'],
\App\Models\Status::REFUNDED => ['label' => 'Refunded', 'class' => 'warning'],
\App\Models\Status::FRAUD => ['label' => 'Fraud', 'class' => 'danger'],
\App\Models\Status::PREPAID => ['label' => 'Prepaid', 'class' => 'primary'],
\App\Models\Status::USED => ['label' => 'Used', 'class' => 'success'],
\App\Models\Status::SCHEDULED => ['label' => 'Scheduled', 'class' => 'primary'],
\App\Models\Status::SUSPENDED => ['label' => 'Suspended', 'class' => 'warning'],
\App\Models\Status::DEACTIVATED => ['label' => 'Deactivated', 'class' => 'warning'],
\App\Models\Status::LIMITED_AVAILABILITY => ['label' => 'Limited Availability', 'class' => 'warning'],
\App\Models\Status::DISPUTED => ['label' => 'Disputed', 'class' => 'danger'],
\App\Models\Status::VOID => ['label' => 'Void', 'class' => 'danger'],
\App\Models\Status::ARCHIVED => ['label' => 'Archived', 'class' => 'dark'],
\App\Models\Status::FILLED => ['label' => 'Filled', 'class' => 'success'],
];
@endphp

<span class="mt-2 badge bg-{{ $statusBadge[$statusId]['class'] ?? 'danger' }}">
    {{ $statusBadge[$statusId]['label'] ?? 'Unknown' }}
</span>
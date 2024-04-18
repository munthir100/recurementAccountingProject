<div class="col-12 mt-4 d-flex justify-content-center">
    <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
        @if($model->currentPage() > 1)
        <li class="page-item">
            <a class="page-link" href="{{ $model->previousPageUrl() }}">
                <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link">
                <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
            </span>
        </li>
        @endif

        @for ($i = 1; $i <= $model->lastPage(); $i++)
            <li class="page-item {{ ($model->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $model->url($i) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</a>
            </li>
            @endfor

            @if($model->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $model->nextPageUrl() }}">
                    <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
                </a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">
                    <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
                </span>
            </li>
            @endif
    </ul>
</div>
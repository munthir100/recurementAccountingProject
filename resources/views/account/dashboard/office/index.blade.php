@extends('account.dashboard.layouts.shared.app-layout')

@section('title')
@include("account.dashboard.layouts.shared.includes.title-meta", ["title" => __("Dashboard")])
@endsection

@section('page-title')
@include("account.dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Home")])
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> New CVs</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$newCvs}}</h4>
                        <a href="{{ route('account.dashboard.office.cvs.index', ['status' => 'new']) }}" class="text-decoration-underline">View All</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                            <i class="bx bxs-file-doc text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
    </div><!--end col-->
    <div class="col-xl-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Pending CVs</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$pendingCvs}}</h4>
                        <a href="{{ route('account.dashboard.office.cvs.index', ['status' => 'pending']) }}" class="text-decoration-underline">View All</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                            <i class="bx bxs-file-doc text-warning"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
    </div><!--end col-->
    <div class="col-xl-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Filled CVs</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$filledCvs}}</h4>
                        <a href="{{ route('account.dashboard.office.cvs.index', ['status' => 'filled']) }}" class="text-decoration-underline">View All</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-success-subtle rounded fs-3">
                            <i class="bx bxs-file-doc text-success"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
    </div><!--end col-->
    <div class="col-xl-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Rejected CVs</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$rejectedCvs}}</h4>
                        <a href="{{ route('account.dashboard.office.cvs.index', ['status' => 'rejected']) }}" class="text-decoration-underline">View All</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-danger-subtle rounded fs-3">
                            <i class="bx bxs-file-doc text-danger"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
    </div><!--end col-->
    <div class="col-xl-12">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total CVs</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{$totalCvs}}</h4>
                        <a href="{{ route('account.dashboard.office.cvs.index') }}" class="text-decoration-underline">View All</a>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-secondary-subtle rounded fs-3">
                            <i class="bx bxs-file-doc text-secondary"></i>
                        </span>
                    </div>
                </div>
            </div><!-- end card body -->
        </div>
    </div><!--end col-->
</div><!--end row-->

<div class="card">
    <div class="card-header">
        <div class="mb-2"></div>
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <div>
                    <a data-bs-toggle="modal" data-bs-target="#addcv" class="btn btn-success add-btn" id="create-btn">
                        <i class="ri-add-line align-bottom me-1"></i> {{ __("Add") }}
                    </a>
                </div>
            </div>
        </div>
    </div><!-- end card header -->

    <div class="card-body">
        <div class="table-responsive table-card">
            <table class="table table-nowrap table-striped-columns mb-3">
                <thead class="table-light">
                    <tr>
                        <th scope="col">{{ __("ID") }}</th>
                        <th scope="col">{{ __("Status") }}</th>
                        <th scope="col">{{ __("Created Date") }}</th>
                        <th scope="col">{{ __("Last Status Update") }}</th>
                        <th scope="col">{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cvs as $cv)
                    <form id="form{{ $cv->id }}" action="{{ route('user.dashboard.cvs.destroy', $cv->id) }}" method="post" class="hidden">
                        @csrf
                        @method('delete')
                    </form>
                    <tr>
                        <td><a href="#" class="fw-semibold">{{ $cv->id }}</a></td>
                        <td> <x-dashboard.table-status-badge statusId="{{ $cv->status_id }}" /> </td>
                        <td>{{ $cv->created_at->diffForHumans() }}</td>
                        <td>{{ $cv->updated_at->diffForHumans() }}</td>

                        <td>
                            <div class="d-flex gap-2">
                                <div class="edit">
                                    <a href="{{ route('account.dashboard.office.cvs.edit', $cv->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                </div>
                                <div class="show-cv">
                                    <a href="{{ $cv->getFirstMediaUrl('cvs') }}" class="btn btn-icon btn-info show-cv-btn" title="{{__('Download')}}"><i class="ri-download-cloud-line"></i></a>
                                </div>
                                <div class="remove">
                                    <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $cv->id }}"><i class="bx bx-trash"></i></button>
                                </div>
                            </div>
                        </td>

                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $cv->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $cv->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $cv->id }}">
                                        {{ __("Confirm Deletion") }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-3">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                        <div class="mt-4 pt-2 fs-15 mx-5">
                                            <h4>{{ __("Are you Sure ?") }}</h4>
                                            <p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Delete this cv?") }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Cancel") }}</button>
                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form{{ $cv->id }}').submit();">
                                        {{ __("Delete") }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete Modal -->
                    @empty
                </tbody>

                <tr>
                    <th colspan="4" class="text-center">{{ __("No items found!") }}</th>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('account.dashboard.office.cvs.index') }}" class="btn btn-primary">
                    View More
                </a>
            </div>
            <div class="modal fade" id="addcv" tabindex="-1" aria-labelledby="addcvLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sidebar-span" id="addcvLabel">{{ __("Add cv") }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('account.dashboard.office.cvs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" class="form-control @error('cv') is-invalid @enderror" value="{{ old('cv') }}">
                                    @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">{{ __("Upload") }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end card-body -->
</div><!-- end card -->
@endsection

@section('styles')
<!-- Additional styles for this page -->
@endsection

@section('scripts')
<!-- Additional scripts for this page -->
@endsection
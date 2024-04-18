@extends('dashboard.layouts.shared.app-layout')

@section('title')
@include("dashboard.layouts.shared.includes.title-meta", ["title" => __("Projects")])
@endsection

@section('page-title')
@include("dashboard.layouts.shared.includes.page-title", ["pagetitle" => __("Account"), "title" => __("Projects")])
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="mb-2"></div>
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#addCv" class="btn btn-success add-btn" id="create-btn">
                                <i class="ri-add-line align-bottom me-1"></i> {{ __("Add") }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <div class="search-box ms-2">
                                <form action="" method="get">
                                    <div class="form-floating">
                                        <input type="text" name="search" class="form-control search" id="search" placeholder="{{ __("Search...") }}">
                                        <label for="search">{{ __("Type a Keyword...") }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap table-striped-columns mb-3">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Office") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($workersCvs as $cv)
                            <form id="form{{ $cv->id }}" action="{{ route('user.dashboard.cvs.destroy', $cv->id) }}" method="post" class="hidden">
                                @csrf
                                @method('delete')
                            </form>
                            <tr>
                                <td><a href="#" class="fw-semibold">{{ $cv->id }}</a></td>

                                <td>{{ $cv->office->account->name }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <a href="{{ route('user.dashboard.cvs.edit', $cv->id) }}" class="btn btn-icon btn-primary edit-item-btn" title="{{__('Edit')}}"><i class="bx bx-edit"></i></a>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-icon btn-danger remove-item-btn" title="{{__('Delete')}}" data-id="{{ $cv->id }}"><i class="bx bx-trash"></i></button>
                                        </div>
                                        <div class="download">
                                            <a href="{{ $cv->getMedia('cvs')->first()->getUrl() }}" class="btn btn-icon btn-success edit-item-btn" title="{{__('Download')}}"><i class="bx bxs-cloud-download"></i></a>
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
                                                    <p class="text-muted mx-4 mb-0">{{ __("Are you Sure You want to Delete this Office?") }}</p>
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
                    <div class="d-flex justify-content-center">
                        <x-dashboard.pagination :model="$workersCvs" />
                    </div>
                    <div class="modal fade" id="addCv" tabindex="-1" aria-labelledby="addCvLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sidebar-span" id="addCvLabel">{{ __("Add CV") }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.dashboard.cvs.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="cv">{{ __("Cv") }}:</label>
                                            <input type="file" id="cv" name="cv" class="form-control @error('cv') is-invalid @enderror" value="{{ old('cv') }}" required autofocus>
                                            @error('cv')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <label for="office_id" class="form-label text-muted">Select Cv .doc, .docx, .pdf</label>
                                            <select class="form-control" data-choices name="office_id" id="office_id">
                                                <option value="">Select Office</option>
                                                @foreach($offices as $office)
                                                <option value="{{$office->id}}">{{$office->account->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">{{ __("Create Office") }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>

@endsection
@section("scripts")
<script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('dashboard/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{asset('dashboard/assets/js/actions/delete-items.js')}}"></script>
@endsection